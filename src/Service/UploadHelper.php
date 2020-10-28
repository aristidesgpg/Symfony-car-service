<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadHelper
 * @package App\Service
 */
class UploadHelper {
    public const VALID_IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png'];
    public const VALID_VIDEO_EXTENSIONS = ['mp4'];

    private $upload_dir;

    /**
     * UploadHelper constructor.
     * @param ContainerInterface $container
     */
    public function __construct (ContainerInterface $container) {
        $this->upload_dir = $this->trimDir($container->getParameter('uploads_directory'));
    }

    /**
     * @param UploadedFile $file
     *
     * @return bool
     */
    public function isValidImage (UploadedFile $file): bool {
        return $this->isValid($file, self::VALID_IMAGE_EXTENSIONS);
    }

    /**
     * @param UploadedFile $file
     *
     * @return bool
     */
    public function isValidVideo (UploadedFile $file): bool {
        return $this->isValid($file, self::VALID_VIDEO_EXTENSIONS);
    }

    /**
     * @param UploadedFile $file
     * @param string|null  $directory
     *
     * @return string
     */
    public function upload (UploadedFile $file, ?string $directory = null): string {
        $targetDir = $this->upload_dir . '/' . $this->trimDir($directory);
        $fileName = md5(uniqid()) . '.' . $this->getExtension($file);
        $file->move($targetDir, $fileName);

        return $targetDir . '/' . $fileName;
    }

    /**
     * @param string $path
     *
     * @return string
     */
    public function pathToRelativeUrl (string $path): string {
        $matches = [];
        if (preg_match('/\/public\/(.*)/', $path, $matches)) {
            return '/' . $matches[1];
        }

        return $path;
    }

    /**
     * @param string $dir
     *
     * @return string
     */
    private function trimDir (string $dir): string {
        return rtrim($dir, '/');
    }

    /**
     * @param UploadedFile $file
     * @param array        $extensions
     *
     * @return bool
     */
    private function isValid (UploadedFile $file, array $extensions): bool {
        return in_array($this->getExtension($file), $extensions);
    }

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    private function getExtension (UploadedFile $file): string {
        return $file->guessExtension();
    }
}