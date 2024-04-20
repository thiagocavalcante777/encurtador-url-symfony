<?php

namespace App\Repository;

use App\Entity\Url;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UrlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Url::class);
    }

    public function obterTodasUrls(): array
    {
        $queryBuilder = $this->createQueryBuilder('url');

        $queryBuilder->select('url');

        return $queryBuilder->getQuery()->getArrayResult();
    }

    public function obterTamanhoUrl(): string
    {
        $queryBuilder = $this->createQueryBuilder('url');
        $queryBuilder->select('path')
            ->orderBy('url.id', 'DESC')
            ->setMaxResults(1);

        $queryBuilder->getQuery()->getResult();
    }

    public function salvar(Url $url): Url
    {
        $this->getEntityManager()->persist($url);
        $this->getEntityManager()->flush();

        return $url;
    }
}