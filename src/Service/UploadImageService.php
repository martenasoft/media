<?php

namespace MartenaSoft\Media\Service;

use MartenaSoft\Common\Exception\CommonException;
use MartenaSoft\Media\Entity\MediaConfig;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class UploadImageService
{
    private string $targetDirectory;
    private SluggerInterface $slugger;
    private KernelInterface $kernel;

    public function __construct(SluggerInterface $slugger, KernelInterface $kernel)
    {
        $this->slugger = $slugger;
        $this->kernel = $kernel;
    }

    public function upload(
        UploadedFile $uploadedFile,
        ?MediaConfig $mediaConfig = null,
        string $publicDir = 'public',
        ?string $projectDir = null
    ): string {
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename. '-' . uniqid().'.'.$uploadedFile->guessExtension();

        $realSizeDir = $this->getPath($mediaConfig->getRealSizeDirName().'//', $publicDir, $projectDir);

        if ($realSizeDir !== null) {

        }

        dump($projectDir, $mediaConfig); die;
        try {
            if (empty($mediaConfig)) {
                throw \Exception('This functional is in developing process');
               // $uploadedFile->move($this->getTargetDirectory(), $fileName);
            }

        } catch (FileException $exception) {
            throw $exception;
        }
    }


    public function setTargetDirectory(string $targetDirectory): void
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }

    protected function getPath(
        string $path,
        string $publicDir = 'public',
        ?string $projectDir = null
    ): ?string {

        if (empty($this->kernel->getProjectDir())) {
            return null;
        }

        if ($projectDir === null) {
            $projectDir = $this->kernel->getProjectDir() .
                DIRECTORY_SEPARATOR .
                $publicDir
            ;
        }

        $result = preg_replace( '/(\/{2,})/', '/', $projectDir . DIRECTORY_SEPARATOR . $path);
        $result = preg_replace('/\/{1,}$/', '', $result);
        if (!is_writable($result)) {
            throw new NotFoundResourceException('Directory: '.$result . ' is not available');
        }
        return $result;
    }

}
