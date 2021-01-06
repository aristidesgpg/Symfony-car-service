<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Process\Process;

/**
 * Class UploadHelper.
 *
 * @package App\Service
 */
class UploadHelper
{
    public const VALID_IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png'];

    /** @var SpacesClient */
    private $spaces;

    /**
     * UploadHelper constructor.
     * @param SpacesClient $spaces
     */
    public function __construct(SpacesClient $spaces)
    {
        $this->spaces = $spaces;
    }

    public function isValidImage(File $file): bool
    {
        return $this->isValid($file, self::VALID_IMAGE_EXTENSIONS);
    }

    public function isValidVideo(File $file): bool
    {
        return 1 === preg_match('/^video\/.+/', $file->getMimeType());
    }

    public function upload(UploadedFile $file, ?string $directory = null): ?string
    {
        if ($this->isValidVideo($file)) {
            throw new \InvalidArgumentException(sprintf('Use %s::uploadVideo for video uploads', __CLASS__));
        }
        $fileName = md5(uniqid()).'.'.$this->getExtension($file);
        $file = $file->move($file->getPath(), $fileName);
        $url = $this->spaces->upload($file, $directory);
        unlink($file->getPathname());

        return $url;
    }

    public function uploadVideo(UploadedFile $file, ?string $directory = null): ?string
    {
        $compressed = $this->compressVideo($file);
        $url = $this->spaces->upload($compressed, $directory);

        unlink($file->getPathname());
        unlink($compressed->getPathname());

        return $url;
    }

    private function compressVideo(File $file): File
    {
        if (!$this->isValidVideo($file)) {
            throw new \InvalidArgumentException(sprintf('%s is not a valid video format', $file->getFilename()));
        }
        $newName = md5(uniqid().time()).'.mp4';
        $newPath = $file->getPath().'/'.$newName;
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
        if (0 !== $exit || !file_exists($newPath)) {
            throw new \RuntimeException('Could not compress video');
        }

        return new File($newPath);
    }

    private function isValid(File $file, array $extensions): bool
    {
        return in_array($this->getExtension($file), $extensions);
    }

    private function getExtension(File $file): ?string
    {
        return $file->guessExtension();
    }
}
