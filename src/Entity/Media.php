<?php

namespace MartenaSoft\Media\Entity;

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
     * @Assert\NotBlank()
     * @ORM\Column()
     */
    private ?string $name = "";

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
}
