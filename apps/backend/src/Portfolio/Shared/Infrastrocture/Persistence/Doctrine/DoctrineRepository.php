<?php

declare(strict_types=1);

namespace App\Portfolio\Shared\Infrastrocture\Persistence\Doctrine;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

abstract class DoctrineRepository
{
    protected ObjectRepository $repository;

    public function __construct(
        private readonly ManagerRegistry $managerRegistry,
        public Connection $connection
    )
    {
        $this->repository = $this->entityManager()->getRepository($this->entityClass());
    }

    public function entityManager() : EntityManager | ObjectManager
    {
        $entityManager = $this->managerRegistry->getManager();

        if($entityManager->isOpen())
        {
            return $entityManager;
        }

        return $this->managerRegistry->resetManager();
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    protected function persist(object $entity) : void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush();
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    protected function delete(object $entity) : void
    {
        $this->entityManager()->remove($entity);
        $this->entityManager()->flush();
    }

    abstract protected static function entityClass() : string;
}