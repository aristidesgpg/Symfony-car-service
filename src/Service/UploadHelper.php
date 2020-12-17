<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Process\Process;

/**
 * Class UploadHelper
 * @package App\Service
 */
class UploadHelper {
    public const VALID_IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png'];

    private $upload_dir;

    /**
     * UploadHelper constructor.
     * @param ContainerInterface $container
     */
    public function __construct (ContainerInterface $container) {
        $this->upload_dir = $this->trimDir($container->getParameter('uploads_directory'));
    }

    /**
     * @param File $file
     *
     * @return bool
     */
    public function isValidImage (File $file): bool {
        return $this->isValid($file, self::VALID_IMAGE_EXTENSIONS);
    }

    /**
     * @param File $file
     *
     * @return bool
     */
    public function isValidVideo (File $file): bool {
        return (preg_match('/^video\/.+/', $file->getMimeType()) === 1);
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
        $movedFile = $file->move($targetDir, $fileName);

        return $movedFile->getRealPath();
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
     * @param File $file
     *
     * @return File
     */
    public function compressVideo (File $file): File {
        if (!$this->isValidVideo($file)) {
            throw new \InvalidArgumentException(sprintf('%s is not a valid video format', $file->getFilename()));
        }
        $newName = md5(uniqid() . time()) . '.mp4';
        $newPath = $file->getPath() . '/' . $newName;
        $process = new Process([
            'ffmpeg',
            '-i',
            $file->getRealPath(),
            '-vf',
            'scale=320:240',
            '-strict',
            '-2',
            $newPath,
        ]);
        $exit = $process->run();
        if ($exit !== 0 || !file_exists($newPath)) {
            throw new \RuntimeException('Could not compress video');
        }
        $newFile = new File($newPath);

        return $newFile->move($file->getPath(), $file->getFilename());
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
     * @param File  $file
     * @param array $extensions
     *
     * @return bool
     */
    private function isValid (File $file, array $extensions): bool {
        return in_array($this->getExtension($file), $extensions);
    }

    /**
     * @param File $file
     *
     * @return string
     */
    private function getExtension (File $file): string {
        return $file->guessExtension();
    }
}