<?php

namespace MartenaSoft\Media\Service;

use MartenaSoft\Media\Entity\MediaConfig;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class UploadImageService
{
    private string $targetDirectory;
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $uploadedFile, ?MediaConfig $mediaConfig = null): string
    {
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename. '-' . uniqid().'.'.$uploadedFile->guessExtension();

        dump($mediaConfig); die;
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
}
