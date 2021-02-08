<?php

namespace App\Service\DMS;

use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use Doctrine\ORM\EntityManagerInterface;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use SoapFault;
use SoapHeader;
use SoapVar;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class AbstractDMSClient.
 */
abstract class AbstractDMSClient implements DMSClientInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var PhoneValidator
     */
    private $phoneValidator;

    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;
    /**
     * @var ThirdPartyAPILogHelper
     */
    private $thirdPartyAPILogHelper;

    private $soapClient;

    public function __construct(EntityManagerInterface $entityManager,
                                PhoneValidator $phoneValidator,
                                ParameterBagInterface $parameterBag,
                                ThirdPartyAPILogHelper $thirdPartyAPILogHelper)
    {
        $this->entityManager = $entityManager;
        $this->phoneValidator = $phoneValidator;
        $this->parameterBag = $parameterBag;
        $this->thirdPartyAPILogHelper = $thirdPartyAPILogHelper;
    }

    public function buildSerializer(string $dir, string $namespacePrefix = '')
    {
        $serializerBuilder = SerializerBuilder::create();
        $serializerBuilder->addMetadataDir($dir, $namespacePrefix);
        $serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handler) use ($serializerBuilder) {
            $serializerBuilder->addDefaultHandlers();
            $handler->registerSubscribingHandler(new BaseTypesHandler()); // XMLSchema List handling
            $handler->registerSubscribingHandler(new XmlSchemaDateHandler()); // XMLSchema date handling
        });
        $this->serializer = $serializerBuilder->build();
    }


    public function initializeSoapClient(string $wsdl)
    {
        try {
            $this->soapClient = new \SoapClient($wsdl, [
                'trace' => 1, //This is needed to get the __getLastResponse()
            ]);

        } catch (\SoapFault $e) {
            $this->logError($this->getWsdl(), $e->getMessage());
        }
    }

    public function sendSoapCall($name, $args, $returnLastResponse = false)
    {
        //It should validate against the wsdl before the call to make sure its correct.
        try {
            $result = $this->getSoapClient()->__soapCall($name, $args);
            if ($returnLastResponse) {
                return $this->getSoapClient()->__getLastResponse();
            }

            return $result;
        } catch (SoapFault $e) {
            //Most likely a malformed request/invalid parameters were provided.

            dd($e->getMessage());
            $this->logError($this->getSoapClient()->__getLastRequestHeaders(), $e->getMessage());

            return [];
        }

    }

    /**
     * The end goal is to find a mobile phone number to validate against. Each DMS returns the number in different formats. This function tries to normalize that into a phone number.
     *
     * TODO Need to see the desired outcome, whether an array or just a string.
     */
    public function phoneNormalizer($phone)
    {
        return $phone;

    }



    /**
     * Helper for creating a Web Services Security UsernameToken.
     *
     * @param $username
     * @param $password
     */
    public function createWSSUsernameToken($username, $password): SoapHeader
    {
        $wssNamespace = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

        $username = new SoapVar($username,
            XSD_STRING,
            null, null,
            'Username',
            $wssNamespace);

        $password = new SoapVar($password,
            XSD_STRING,
            null, null,
            'Password',
            $wssNamespace);

        $usernameToken = new SoapVar([$username, $password],
            SOAP_ENC_OBJECT,
            null, null,
            'UsernameToken',
            $wssNamespace);

        $usernameToken = new SoapVar([$usernameToken],
            SOAP_ENC_OBJECT,null, null, null,
            $wssNamespace);

        return new SoapHeader($wssNamespace, 'Security', $usernameToken);
    }

    /**
     * @param $request
     * @param $response
     * @param bool $isRest
     */
    public function logError($request, $response, $isRest = true)
    {
        if ($isRest) {
            $this->getThirdPartyAPILogHelper()->commitAPILog($request, null, $response, $isRest);
        } else {
            $this->getThirdPartyAPILogHelper()->commitAPILog(null, $request, $response, $isRest);
        }
    }

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }

    public function setSerializer(Serializer $serializer): void
    {
        $this->serializer = $serializer;
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    public function getPhoneValidator(): PhoneValidator
    {
        return $this->phoneValidator;
    }

    public function setPhoneValidator(PhoneValidator $phoneValidator): void
    {
        $this->phoneValidator = $phoneValidator;
    }

    public function getParameterBag(): ParameterBagInterface
    {
        return $this->parameterBag;
    }

    public function setParameterBag(ParameterBagInterface $parameterBag): void
    {
        $this->parameterBag = $parameterBag;
    }

    public function getThirdPartyAPILogHelper(): ThirdPartyAPILogHelper
    {
        return $this->thirdPartyAPILogHelper;
    }

    public function setThirdPartyAPILogHelper(ThirdPartyAPILogHelper $thirdPartyAPILogHelper): void
    {
        $this->thirdPartyAPILogHelper = $thirdPartyAPILogHelper;
    }

    /**
     * @return mixed
     */
    public function getSoapClient()
    {
        return $this->soapClient;
    }

    /**
     * @param mixed $soapClient
     */
    public function setSoapClient($soapClient): void
    {
        $this->soapClient = $soapClient;
    }
}
