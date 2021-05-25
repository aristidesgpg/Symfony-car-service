<?php

namespace App\Service\DMS;

use App\Service\PhoneValidator;
use App\Service\SlackClient;
use App\Service\ThirdPartyAPILogHelper;
use Doctrine\ORM\EntityManagerInterface;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
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

    /**
     * @var
     */
    private $soapClient;

    /**
     * @var
     */
    private $guzzleClient;

    /**
     * @var
     */
    private $guzzleType;
    /**
     * @var SlackClient
     */
    private $slackClient;

    public function __construct(EntityManagerInterface $entityManager,
                                PhoneValidator $phoneValidator,
                                ParameterBagInterface $parameterBag,
                                ThirdPartyAPILogHelper $thirdPartyAPILogHelper,
                                SlackClient $slackClient)
    {
        $this->entityManager = $entityManager;
        $this->phoneValidator = $phoneValidator;
        $this->parameterBag = $parameterBag;
        $this->thirdPartyAPILogHelper = $thirdPartyAPILogHelper;
        $this->slackClient = $slackClient;
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

    public function buildEmptySerializer()
    {
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
    }

    public function initializeSoapClient(string $wsdl, $options = [])
    {
        $options = array_merge(
            [
                'trace' => 1, //This is needed to get the __getLastResponse()
            ],
            $options);

        try {
            $this->soapClient = new \SoapClient($wsdl, $options);
        } catch (\SoapFault $e) {
            $this->logError($this->getWsdl(), $e->getMessage(), false, true);
        }
    }

    /**
     * Provides a list of the functions and struct's available for a wsdl. Used for development only.
     */
    public function describeWsdl(string $wsdl)
    {
        try {
            $client = new \SoapClient($wsdl, [
                'trace' => 1, //This is needed to get the __getLastResponse()
            ]);
            dump($client->__getFunctions());
            dump($client->__getTypes());
        } catch (\SoapFault $e) {
            dump($e->getMessage());
        }
    }

    /**
     * @param $name
     * @param $args
     * @param false $returnLastResponse
     *
     * @return mixed|string|null
     */
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
            //dd($e->getMessage());
            $this->logError($this->getSoapClient()->__getLastRequestHeaders(), $e->getMessage(), false, true);
        }

        return null;
    }

    /**
     * @param $baseURI
     * @param $options
     * @param string $type
     */
    public function initializeGuzzleClient($baseURI, $options, $type = 'POST')
    {
        $this->setGuzzleType($type);
        $headers = array_merge(
            ['base_uri' => $baseURI],
            $options
        );
        $this->setGuzzleClient(new Client($headers));
    }

    /**
     * @param $uri
     * @param array $options
     *
     * @return null
     */
    public function sendGuzzleRequest($uri, $options = [])
    {
        try {
            $response = $this->getGuzzleClient()->request($this->getGuzzleType(), $uri, $options);

            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            if ($e->hasResponse()) {
                $error = sprintf('Response: %s, Contents: %s',
                    $e->getResponse()->getStatusCode(),
                    $e->getResponse()->getBody()->getContents()
                );
                $this->logError($uri, $error, true, true);
            }
        }

        return null;
    }

    /**
     * The end goal is to find a mobile phone number to validate against. Each DMS returns the number in different formats. This function tries to normalize that into a valid mobile phone number.
     *
     * @param $phone
     *
     * @return null
     */
    public function phoneNormalizer($phone): ?string
    {
        if (is_array($phone)) {
            foreach ($phone as $p) {
                $result = $this->phoneNormalizerParser($p);
                if ($result) {
                    return $result;
                }
            }
            //No valid mobile found.
            return null;
        }

        return $this->phoneNormalizerParser($phone);
    }

    /**
     * Checks if a phone is mobile and valid.
     *
     * @param $phoneNumber
     *
     * @return null
     */
    private function phoneNormalizerParser($phoneNumber)
    {
        try {
            return $this->getPhoneValidator()->clean($phoneNumber);
//            $isMobile = $this->getPhoneValidator()->isMobile($cleaned);
//            if ($isMobile) {
//                //Found a valid mobile number.
//                return $phoneNumber;
//            }
        } catch (\Exception $exception) {
            //Couldn't validate phone.
        }

        return null;
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
     */
    public function logError($request, $response, bool $isRest = false, bool $exception = false)
    {
        $desiredLen = 3000000;
        if (strlen($response) > $desiredLen) {
            $response = substr($response, 0, $desiredLen);
        }

        //        $this->settingsHelper->getSetting('generalName');
        if ($exception) {
            $message = sprintf('Request: %s, Response: %s', $request, $response);
            if (!str_contains($response, 'There was an error pulling repaire orders for the roNumber')) {
                if ('prod' == $this->getParameterBag()->get('app_env')) {
                    $this->getSlackClient()->sendMessage('Mr.Robot', $message);
                }
            }


        }

        if ($isRest) {
            $this->getThirdPartyAPILogHelper()->commitAPILog($request, null, $response, $isRest);
        } else {
            $this->getThirdPartyAPILogHelper()->commitAPILog(null, $request, $response, $isRest);
        }
    }

    /**
     * @param $bins
     */
    public function binProcessor($bins): ?string
    {
        if (is_array($bins)) {
            if (empty($bins)) {
                return null;
            }

            return implode(', ', array_filter($bins));
        }

        return $bins;
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

    /**
     * @return mixed
     */
    public function getGuzzleClient()
    {
        return $this->guzzleClient;
    }

    /**
     * @param mixed $guzzleClient
     */
    public function setGuzzleClient($guzzleClient): void
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @return mixed
     */
    public function getGuzzleType()
    {
        return $this->guzzleType;
    }

    /**
     * @param mixed $guzzleType
     */
    public function setGuzzleType($guzzleType): void
    {
        $this->guzzleType = $guzzleType;
    }

    public function getSlackClient(): SlackClient
    {
        return $this->slackClient;
    }

    public function setSlackClient(SlackClient $slackClient): void
    {
        $this->slackClient = $slackClient;
    }
}
