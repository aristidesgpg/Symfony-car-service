<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
     * ImageUploader constructor.
     *
     * @param EntityManagerInterface $em
     * @param Container              $container
     */
    public function __construct (EntityManagerInterface $em, Container $container) {
        $this->em        = $em;
        $this->container = $container;
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

        return $uploadsDirectory . '/' . $filename;
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
