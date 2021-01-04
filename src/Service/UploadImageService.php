<?php

namespace MartenaSoft\Media\Service;

use MartenaSoft\Common\Exception\CommonException;
use MartenaSoft\Common\Service\DirectoryManagerService\DirectoryManagerService;
use MartenaSoft\Media\Entity\MediaConfig;
use MartenaSoft\Media\MartenaSoftMediaBundle;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class UploadImageService
{
    private string $targetDirectory;
    private SluggerInterface $slugger;
    private KernelInterface $kernel;
    private LoggerInterface $logger;
    private DirectoryManagerService $directoryManagerService;

    public function __construct(
        SluggerInterface $slugger,
        KernelInterface $kernel,
        LoggerInterface $logger,
        DirectoryManagerService $directoryManagerService
    )
    {
        $this->slugger = $slugger;
        $this->kernel = $kernel;
        $this->logger = $logger;
        $this->directoryManagerService = $directoryManagerService;
    }

    public function upload(
        UploadedFile $uploadedFile,
        ?MediaConfig $mediaConfig = null,
        string $publicDir = 'public',
        ?string $projectDir = null
    ): string {

        $parameters = $this->kernel->getContainer()->getParameter(MartenaSoftMediaBundle::getConfigName());

        $tmpFile = $uploadedFile->getRealPath();
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename. '-' . uniqid().'.'.$uploadedFile->guessExtension();

       /* if (!empty($mediaConfig->getRealSizeDirName())) {
            $realSizeDir = $this->getPath($mediaConfig->getRealSizeDirName(), $publicDir, $projectDir);
            $uploadedFile->move($realSizeDir, $fileName);
            $tmpFile = $realSizeDir . DIRECTORY_SEPARATOR .  $fileName;
        }*/


        if (!empty($bigSizeDirName = $mediaConfig->getBigSizeDirName())) {
            $bigSizeDir = $this->getPath($bigSizeDirName, $publicDir, $projectDir);
            $bigFile = $bigSizeDir. DIRECTORY_SEPARATOR . $fileName;

            $this->resize($tmpFile, $bigFile, $mediaConfig->getBigSizeWidth(), $mediaConfig->getBigSizeHeight());
        }

        if (!empty($middleSizeDirName = $mediaConfig->getMiddleSizeDirName())) {
            $middleSizeDir = $this->getPath($middleSizeDirName, $publicDir, $projectDir);
            $middleFile = $middleSizeDir. DIRECTORY_SEPARATOR . $fileName;

            $this->resize(
                $tmpFile,
                $middleFile,
                $mediaConfig->getMiddleSizeWidth(),
                $mediaConfig->getMiddleSizeHeight()
            );
        }

        if (!empty($smallSizeDirName = $mediaConfig->getSmallSizeDirName())) {
            $smallSizeDir = $this->getPath($smallSizeDirName, $publicDir, $projectDir);
            $smallFile = $smallSizeDir. DIRECTORY_SEPARATOR . $fileName;

            $this->resize(
                $tmpFile,
                $smallFile,
                $mediaConfig->getSmallSizeWidth(),
                $mediaConfig->getSmallSizeHeight()
            );
        }

        return $fileName;
    }


    public function resize(string $realFile, string $newFileName, int $width, int $height): void
    {
        $imagick = new \Imagick($realFile);
        $imagick->thumbnailImage($width, $height, true, true);
        $imagick->writeImage($newFileName);
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
        ?string $path = null,
        string $publicDir = 'public',
        ?string $projectDir = null,
        bool $isCreateDir = true
    ): ?string {

        if (empty($path) || empty($this->kernel->getProjectDir())) {
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

        if ($isCreateDir) {
            try {

                if (!empty($result) && !is_dir($result) && !mkdir($result, 0777, true)) {
                    $messageArray = error_get_last();
                    $message = "Error create directory";

                    if (!empty($messageArray['message'])) {
                        $message = $messageArray['message'];
                    }

                    $exception = new CommonException($message .': '.$result);
                    $exception->setUserMessage($message.': '.$path);
                }

            } catch (FileException | \Throwable $exception) {
                throw $exception;
            }
        }
        return $result;
    }
}
