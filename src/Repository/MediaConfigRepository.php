<?php

namespace MartenaSoft\Media\Repository;

use Doctrine\Persistence\ManagerRegistry;
use MartenaSoft\Common\Repository\AbstractCommonRepository;
use MartenaSoft\Media\Entity\MediaConfig;

class MediaConfigRepository extends AbstractCommonRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaConfig::class);
    }

    public static function getAlias(): string
    {
        return 'md_conf';
    }


    public function getByName(string $name): ?MediaConfig
    {
        return $this
            ->getQueryBuilder()
            ->where(self::getAlias().".name=:name")
            ->setParameter("name", $name)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
