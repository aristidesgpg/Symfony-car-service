<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Process\Process;

/**
 * Class UploadHelper
 * @package App\Service
 */
class UploadHelper {
    public const VALID_IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png'];

    /** @var SpacesClient */
    private $spaces;

    /**
     * UploadHelper constructor.
     * @param SpacesClient $spaces
     */
    public function __construct (SpacesClient $spaces) {
        $this->spaces = $spaces;
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
        if ($this->isValidVideo($file)) {
            throw new \InvalidArgumentException(sprintf('Use %s::uploadVideo for video uploads', __CLASS__));
        }
        $fileName = md5(uniqid()) . '.' . $this->getExtension($file);
        $file = $file->move($file->getPath(), $fileName);
        $url = $this->spaces->upload($file, $directory);
        unlink($file->getPathname());

        return $url;
    }

    /**
     * @param UploadedFile $file
     * @param string|null  $directory
     *
     * @return string
     */
    public function uploadVideo (UploadedFile $file, ?string $directory = null): string {
        $compressed = $this->compressVideo($file);
        $url = $this->spaces->upload($compressed, $directory);
        unlink($file->getPathname());
        unlink($compressed->getPathname());

        return $url;
    }

    /**
     * @param File $file
     *
     * @return File
     */
    private function compressVideo (File $file): File {
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

        return new File($newPath);
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