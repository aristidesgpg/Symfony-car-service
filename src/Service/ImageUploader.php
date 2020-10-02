<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
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
        $this->em         = $em;
        $this->container  = $container;
    }

        /**
    * @param UploadedFile $file
    *
    * @return string
    */
    public function uploadImage (UploadedFile $file): string {
        $uploadsDirectory = $this->container->getParameter('uploads_directory');
        $filename         = md5(uniqid()).'.'.$file->guessExtension();

        $file->move(
            $uploadsDirectory,
            $filename
        );

        $fullpath = $uploadsDirectory.'/'.$filename;
        return $fullpath;
    }
}
