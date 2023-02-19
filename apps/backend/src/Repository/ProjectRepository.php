<?php

namespace App\Repository;

use App\Entity\Project;

class ProjectRepository extends DoctrineBaseRepository
{
    public function save(Project $project) : void
    {
        $this->saveEntity($project);
    }

    public function remove(Project $project) : void
    {
        $this->removeEntity($project);
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