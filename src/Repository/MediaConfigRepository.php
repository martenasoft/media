<?php

namespace MartenaSoft\Media\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use MartenaSoft\Media\Entity\MediaConfig;

class MediaConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaConfig::class);
    }

}