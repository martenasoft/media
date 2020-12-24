<?php

namespace MartenaSoft\Media\Entity;

use  Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use MartenaSoft\Media\Repository\MediaConfigRepository;

/**
 * @ORM\Entity(repositoryClass="MediaConfigRepository")
 * @UniqueEntity (
 *     fields={"name"}
 * )
 */
class MediaConfig
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

    private ?int $id = null;

    /**
     * @ORM\Column()
     */
    private ?string $name = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $sdnUrl = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $sdnUrlForDev = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $rootDir = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $siteDir = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $realSizeDirName = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $bigSizeDirName = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $middleSizeDirName = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $smallSizeDirName = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $bigSizeWidth= null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $bigSizeHeight= null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $middleSizeWidth= null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $middleSizeHeight= null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $smallSizeWidth= null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $smallSizeHeight= null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $realSizeWatermarkDirName = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $bigSizeWatermarkDirName = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $middleSizeWatermarkDirName = null;

    /**
     * @ORM\Column(nullable=true)
     */
    private ?string $smallSizeWatermarkDirName = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSdnUrl(): ?string
    {
        return $this->sdnUrl;
    }

    public function setSdnUrl(?string $sdnUrl): self
    {
        $this->sdnUrl = $sdnUrl;
        return $this;
    }

    public function getSdnUrlForDev(): ?string
    {
        return $this->sdnUrlForDev;
    }

    public function setSdnUrlForDev(?string $sdnUrlForDev): self
    {
        $this->sdnUrlForDev = $sdnUrlForDev;
        return $this;
    }

    public function getRootDir(): ?string
    {
        return $this->rootDir;
    }

    public function setRootDir(?string $rootDir): self
    {
        $this->rootDir = $rootDir;
        return $this;
    }

    public function getSiteDir(): ?string
    {
        return $this->siteDir;
    }

    public function setSiteDir(?string $siteDir): self
    {
        $this->siteDir = $siteDir;
        return $this;
    }

    public function getRealSizeDirName(): ?string
    {
        return $this->realSizeDirName;
    }

    public function setRealSizeDirName(?string $realSizeDirName): self
    {
        $this->realSizeDirName = $realSizeDirName;
        return $this;
    }

    public function getBigSizeDirName(): ?string
    {
        return $this->bigSizeDirName;
    }

    public function setBigSizeDirName(?string $bigSizeDirName): self
    {
        $this->bigSizeDirName = $bigSizeDirName;
        return $this;
    }

    public function getMiddleSizeDirName(): ?string
    {
        return $this->middleSizeDirName;
    }

    public function setMiddleSizeDirName(?string $middleSizeDirName): self
    {
        $this->middleSizeDirName = $middleSizeDirName;
        return $this;
    }

    public function getSmallSizeDirName(): ?string
    {
        return $this->smallSizeDirName;
    }

    public function setSmallSizeDirName(?string $smallSizeDirName): self
    {
        $this->smallSizeDirName = $smallSizeDirName;
        return $this;
    }

    public function getBigSizeWidth(): ?int
    {
        return $this->bigSizeWidth;
    }

    public function setBigSizeWidth(?int $bigSizeWidth): self
    {
        $this->bigSizeWidth = $bigSizeWidth;
        return $this;
    }

    function getBigSizeHeight(): ?int
    {
        return $this->bigSizeHeight;
    }

    public function setBigSizeHeight(?int $bigSizeHeight): self
    {
        $this->bigSizeHeight = $bigSizeHeight;
        return $this;
    }

    public function getMiddleSizeWidth(): ?int
    {
        return $this->middleSizeWidth;
    }

    public function setMiddleSizeWidth(?int $middleSizeWidth): self
    {
        $this->middleSizeWidth = $middleSizeWidth;
        return $this;
    }

    public function getMiddleSizeHeight(): ?int
    {
        return $this->middleSizeHeight;
    }

    public function setMiddleSizeHeight(?int $middleSizeHeight): self
    {
        $this->middleSizeHeight = $middleSizeHeight;
        return $this;
    }

    public function getSmallSizeWidth(): ?int
    {
        return $this->smallSizeWidth;
    }

    public function setSmallSizeWidth(?int $smallSizeWidth): self
    {
        $this->smallSizeWidth = $smallSizeWidth;
        return $this;
    }

    public function getSmallSizeHeight(): ?int
    {
        return $this->smallSizeHeight;
    }

    public function setSmallSizeHeight(?int $smallSizeHeight): self
    {
        $this->smallSizeHeight = $smallSizeHeight;
        return $this;
    }

    public function getRealSizeWatermarkDirName(): ?string
    {
        return $this->realSizeWatermarkDirName;
    }

    public function setRealSizeWatermarkDirName(?string $realSizeWatermarkDirName): self
    {
        $this->realSizeWatermarkDirName = $realSizeWatermarkDirName;
        return $this;
    }

    public function getBigSizeWatermarkDirName(): ?string
    {
        return $this->bigSizeWatermarkDirName;
    }

    public function setBigSizeWatermarkDirName(?string $bigSizeWatermarkDirName): self
    {
        $this->bigSizeWatermarkDirName = $bigSizeWatermarkDirName;
        return $this;
    }

    public function getMiddleSizeWatermarkDirName(): ?string
    {
        return $this->middleSizeWatermarkDirName;
    }

    public function setMiddleSizeWatermarkDirName(?string $middleSizeWatermarkDirName): self
    {
        $this->middleSizeWatermarkDirName = $middleSizeWatermarkDirName;
        return $this;
    }

    public function getSmallSizeWatermarkDirName(): ?string
    {
        return $this->smallSizeWatermarkDirName;
    }

    public function setSmallSizeWatermarkDirName(?string $smallSizeWatermarkDirName): self
    {
        $this->smallSizeWatermarkDirName = $smallSizeWatermarkDirName;
        return $this;
    }
}
