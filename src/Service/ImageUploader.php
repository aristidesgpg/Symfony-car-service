<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\UrlHelper;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


/**
 * Class ImageUploader
 *
 * @package App\Service
 */
class ImageUploader {

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
     *
     * @param EntityManagerInterface $em
     * @param Container              $container
     * @param UrlHelper              $urlHelper
     * @param UrlGeneratorInterface  $urlGenerator
     */
    public function __construct (EntityManagerInterface $em, Container $container, UrlHelper $urlHelper,
                                 UrlGeneratorInterface $urlGenerator) {
        $this->em           = $em;
        $this->container    = $container;
        $this->urlHelper    = $urlHelper;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param UploadedFile $file
     * @param null         $directory
     *
     * @return false|string
     */
    public function uploadImage (UploadedFile $file, $directory = null) {
        $uploadsDirectory = $this->container->getParameter('uploads_directory') . $directory;
        $filename         = md5(uniqid()) . '.' . $file->guessExtension();

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

        // return $this->urlHelper->getAbsoluteUrl('uploads/' . $directory . '/' . $filename);
        //get the route url
        $url = $this->urlGenerator->generate('app_coupons_new', [], UrlGeneratorInterface::ABSOLUTE_URL);
        //make the public url for the uploaded file
        $publicURL = substr($url, 0, strpos($url, "api")).'uploads/'.$directory . '/' . $filename;
        return $publicURL;
    }

    /**
     * @param UploadedFile $file
     *
     * @return bool
     */
    public function isValidImage (UploadedFile $file) {
        // all the image extension types in array
        $validExtensions = ['jpg', 'jpeg', 'png'];

        //check image extension not in the array $type
        if (!(in_array($file->guessExtension(), $validExtensions))) {
            return false;
        }

        return true;
    }
}
