<?php

declare(strict_types=1);

namespace App\Repository;

use App\Portfolio\Project\Domain\Project;
use App\Portfolio\Project\Domain\ProjectRepository;
use App\Portfolio\Shared\Infrastrocture\Persistence\Doctrine\DoctrineRepository;

class DoctrineProjectRepository extends DoctrineRepository implements ProjectRepository
{
    public function save(Project $project) : void
    {
        $this->save($project);
    }

    public function remove(Project $project) : void
    {
        $this->remove($project);
    }

    public function findOneById(string $id) : ?Project
    {
        return $this->repository->find($id);
    }

    protected static function entityClass(): string
    {
        return Project::class;
    }
}