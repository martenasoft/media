<?php

namespace MartenaSoft\Media\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use MartenaSoft\Media\Repository\MediaRepository;
/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 * @UniqueEntity(
 *     fields={"name"}
 * )
 */
class Media
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="MediaConfig")
     * @ORM\Column(nullable=true)
     */
    private ?MediaConfig $mediaConfig;


    /**
     * @ORM\OneToMany(targetEntity="MediaFiles")
     * @ORM\Column(nullable=true)
     */
    private ?Collection $files;

    /** 
     * @Assert\NotBlank()
     * @ORM\Column()
     */
    private ?string $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description = null;


    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

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

    public function getMediaConfig(): ?MediaConfig
    {
        return $this->mediaConfig;
    }

    public function setMediaConfig(?MediaConfig $mediaConfig): self
    {
        $this->mediaConfig = $mediaConfig;
        return $this;
    }

    public function getFiles(): ?Collection
    {
        return $this->files;
    }

    public function setFiles($files): self
    {
        $this->files = $files;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
