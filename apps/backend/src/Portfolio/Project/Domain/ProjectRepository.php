<?php

declare(strict_types=1);

namespace App\Portfolio\Project\Domain;

interface ProjectRepository
{
    public function save(Project $project) : void;
    public function remove(Project $project) : void;
    public function findOneById(string $id) : ?Project;
}