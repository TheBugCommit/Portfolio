<?php

declare(strict_types=1);

namespace App\Repository;

use App\Portfolio\Shared\Infrastrocture\Persistence\Doctrine\DoctrineRepository;

class DevTechnologyRepository extends DoctrineRepository
{
    public function save(DevTechnology $devTechnology) : void
    {
        $this->save($devTechnology);
    }

    public function remove(DevTechnology $devTechnology) : void
    {
        $this->remove($devTechnology);
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