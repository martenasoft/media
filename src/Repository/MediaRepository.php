<?php

namespace MartenaSoft\Media\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use MartenaSoft\Content\Repository\AbstractContentRepository;
use MartenaSoft\Media\Entity\Media;

class MediaRepository extends AbstractContentRepository
{
    public static function getAlias(): string
    {
        return 'media';
    }

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Media::class);
    }
}
