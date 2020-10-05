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
        $this->em        = $em;
        $this->container = $container;
    }

    /**
     * @param UploadedFile $file
     *
     * @param              $directory
     *
     * @return string
     */
    public function uploadImage (UploadedFile $file, $directory = null): string {
        $uploadsDirectory = $this->container->getParameter('uploads_directory') . $directory;
        $filename         = md5(uniqid()) . '.' . $file->guessExtension();

        try {
            $file->move(
                $uploadsDirectory,
                $filename
            );
        }
        catch(Exception  $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return false;
        }
        
       
        $fullpath = $uploadsDirectory . '/' . $filename;
        return $fullpath;
    }

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    public function isValidImage (UploadedFile $file): string {
        // all the image extension types in array
        $type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png'); 
 
        //check image extension not in the array $type
        if(!(in_array($file->guessExtension(),$type))){ 
            return false;
        }

        return true;
    }
}
