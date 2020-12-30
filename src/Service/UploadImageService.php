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

        $templateDirectory = $parameters['tmp_dir'];

        $this->directoryManagerService->createDirByPath($templateDirectory);

        die("file: ".__FILE__ ." line: ".__LINE__);

        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename. '-' . uniqid().'.'.$uploadedFile->guessExtension();

        try {
          //  $mediaConfig->setRealSizeDirName('img/article/real');
            $realSizeDir = $this->getPath($mediaConfig->getRealSizeDirName(), $publicDir, $projectDir);

            if ($realSizeDir !== null) {

            } else {

                $this->logger->warning("sdsdsd");
                dump($templateDirectory);
            }

          //  die("file: ".__FILE__ ." line: ".__LINE__);
          /*  if (empty($mediaConfig)) {


                throw \Exception('This functional is in developing process');
               // $uploadedFile->move($this->getTargetDirectory(), $fileName);
            }*/


        } catch (CommonException | FileException | \Throwable $exception) {

            throw $exception;
        }

        return $fileName;
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
        ?string $projectDir = null
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
        if (!is_writable($result)) {
            $commonException = new CommonException('Directory: '.$result . ' is not available');
            $commonException
                ->setUserMessage('Directory: '
                    . $publicDir. DIRECTORY_SEPARATOR . $path . ' is not available');
            throw $commonException;
        }
        return $result;
    }
}
