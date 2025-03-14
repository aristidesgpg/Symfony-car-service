<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\UrlHelper;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class ImageUploader.
 */
class ImageUploader
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var UrlHelper
     */
    private $urlHelper;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * ImageUploader constructor.
     */
    public function __construct(
        EntityManagerInterface $em,
        Container $container,
        UrlHelper $urlHelper,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->em = $em;
        $this->container = $container;
        $this->urlHelper = $urlHelper;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param null $directory
     *
     * @return false|string
     * @throws Exception
     */
    public function uploadImage(UploadedFile $file, $directory = null)
    {
        $uploadsDirectory = $this->container->getParameter('uploads_directory').$directory;
        $filename = md5(uniqid()).'.'.$file->guessExtension();

        try {
            $this->isValidImage($file);
        } catch (Exception $e) {
            throw new Exception("Not a valid image file."); //generic but better than false
        }

        try {
            $file->move(
                $uploadsDirectory,
                $filename
            );
        } catch (Exception  $e) {
            //return false;
            throw $e; //throw caught exception from UploadedFile->move
        }

        /*
        if (!$this->isValidImage($file)) {
            return false;
        }

        try {
            $file->move(
                $uploadsDirectory,
                $filename
            );
        } catch (Exception  $e) {
            return false;
        }
        */
        // return $this->urlHelper->getAbsoluteUrl('uploads/' . $directory . '/' . $filename);
        //get the route url
        $url = $this->urlGenerator->generate('app_coupons_new', [], UrlGeneratorInterface::ABSOLUTE_URL);
        //make the public url for the uploaded file
        $publicURL = substr($url, 0, strpos($url, 'api')).'uploads/'.$directory.'/'.$filename;

        return $publicURL;
    }

    /**
     * @return bool
     */
    public function isValidImage(UploadedFile $file)
    {
        // all the image extension types in array
        $validExtensions = ['jpg', 'jpeg', 'png'];

        //check image extension not in the array $type
        if (!(in_array($file->guessExtension(), $validExtensions))) {
            return false;
        }

        return true;
    }
}
