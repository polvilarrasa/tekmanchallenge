<?php

namespace App\Shared\Infrastructure;

use App\Shared\Domain\AggregateRoot;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class DoctrineRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    protected function entityManager(): EntityManager
    {
        return $this->entityManager;
    }

    protected function persist(AggregateRoot $entity, $flush = true): void
    {
        $this->entityManager()->persist($entity);
        if ($flush) {
            $this->entityManager()->flush($entity);
        }
    }

    protected function remove(AggregateRoot $entity, $flush = true): void
    {
        $this->entityManager()->remove($entity);
        if ($flush) {
            $this->entityManager()->flush($entity);
        }
    }

    protected function repository(string $entityClass): EntityRepository
    {
        return $this->entityManager->getRepository($entityClass);
    }
}