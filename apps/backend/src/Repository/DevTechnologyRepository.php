<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\DevTechnology;

class DevTechnologyRepository extends DoctrineBaseRepository
{
    public function save(DevTechnology $devTechnology) : void
    {
        $this->saveEntity($devTechnology);
    }

    public function remove(DevTechnology $devTechnology) : void
    {
        $this->removeEntity($devTechnology);
    }

    public function findOneById(string $id) : ?DevTechnology
    {
        return $this->repository->find($id);
    }

    protected static function entityClass(): string
    {
        return DevTechnology::class;
    }
}