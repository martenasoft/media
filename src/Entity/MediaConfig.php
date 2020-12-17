<?php

namespace MartenaSoft\Media\Entity;

use  Doctrine\ORM\Mapping as ORM;
use MartenaSoft\Common\Library\CommonValues;
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

}