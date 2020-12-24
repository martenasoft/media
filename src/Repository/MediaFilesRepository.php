<?php

namespace MartenaSoft\Media\Repository;

use Doctrine\Persistence\ManagerRegistry;
use MartenaSoft\Content\Repository\AbstractContentRepository;
use MartenaSoft\Media\Entity\MediaFiles;

class MediaFilesRepository extends AbstractContentRepository
{
    public static function getAlias(): string
    {
        return 'mf';
    }

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaFiles::class);
    }
}
