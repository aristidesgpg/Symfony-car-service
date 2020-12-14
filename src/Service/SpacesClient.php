<?php

namespace App\Service;

use Aws\S3\S3Client;

class SpacesClient {
    private const KEY         = 'Y7US5M222XVQZAMB2YEH';
    private const SECRET      = 'pbSoM83sRPmz3pOQMVT3d/ZI/CYvzZKZ2y183ON3hg4';
    private const REGION      = 'sfo2';
    private const BUCKET_NAME = 'autoboost';

    /** @var S3Client */
    private $client;

    /** @var string */
    private $clientSubdomain;

    /**
     * SpacesClient constructor.
     * @param string $customerURL
     */
    public function __construct (string $customerURL) {
        $this->client          = new S3Client([
            'version'     => 'latest',
            'region'      => self::REGION,
            'endpoint'    => sprintf('https://%s.digitaloceanspaces.com', self::REGION),
            'credentials' => [
                'key'    => self::KEY,
                'secret' => self::SECRET,
            ]
        ]);
        $this->clientSubdomain = preg_replace('~https?://(.+).iserviceauto.com/~', '$1', $customerURL);
    }

    /**
     * @param \SplFileInfo $file
     * @param string|null  $directory
     *
     * @return string
     */
    public function upload (\SplFileInfo $file, ?string $directory = null): string {
        if (!$file->isReadable()) {
            throw new \InvalidArgumentException("File '{$file->getPathname()}' is not readable");
        }
        if ($directory === null) {
            $directory = $this->clientSubdomain;
        }
        $fileStream = fopen($file->getPathname(), 'r+');

        $response = $this->client->putObject([
            'Bucket' => self::BUCKET_NAME,
            'Key'    => $directory . '/' . $file->getBasename(),
            'Body'   => $fileStream,
            'ACL'    => 'public-read'
        ]);
        fclose($fileStream);
        if (!$response || !isset($response['ObjectURL'])) {
            throw new \RuntimeException('Could not upload file');
        }

        return $response['ObjectURL'];
    }
}