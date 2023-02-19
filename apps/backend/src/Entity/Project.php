<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Factory\UuidFactory;

//TODO refactor to DDD architecture

class Project
{
    private string $id;
    private string $title;
    private string $img;
    private string $description;
    private bool $isDeveloping;
    private Collection $categories;
    private Collection $devTechnologies;
    private \DateTime $createdOn;
    private \DateTime $updatedOn;

    public function  __construct(string $title, string $description, string $img, bool $isDeveloping, private readonly UuidFactory $uuidFactory)
    {
        $this->id = $this->uuidFactory->create()->toRfc4122();
        $this->title = $title;
        $this->img = $img;
        $this->description = $description;
        $this->isDeveloping = $isDeveloping;
        $this->categories = new ArrayCollection();
        $this->devTechnologies = new ArrayCollection();
        $this->createdOn = new \DateTime();
        $this->markAsUpdated();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isDeveloping(): bool
    {
        return $this->isDeveloping;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    /**
     * @return array | \ArrayIterator|\Traversable
     * @throws \Exception
     */
    public function getCategories() : array | \ArrayIterator|\Traversable
    {
        return $this->categories->getIterator();
    }

    /**
     * @return void
     */
    public function removeAllCategories() : void
    {
        $this->categories->clear();
    }

    public function removeCategoryById(int $id) : ?Category //TODO create search by criteria
    {
        foreach ($this->categories->getValues() as $key => $category)
        {
            if($id == $category->getId())
            {
                return $this->categories->remove($key);
            }
        }

        return null;
    }

    public function addCategory(Category $category) : void
    {
        $this->categories->add($category);
    }

    /**
     * @return array | \ArrayIterator|\Traversable
     * @throws \Exception
     */
    public function getDevTechnologies() : array | \ArrayIterator|\Traversable
    {
        return $this->devTechnologies->getIterator();
    }

    /**
     * @return void
     */
    public function removeAllDevTechnology() : void
    {
        $this->devTechnologies->clear();
    }

    public function removeDevTechnologyById(int $id) : ?DevTechnology //TODO create search by criteria
    {
        foreach ($this->devTechnologies->getValues() as $key => $devTechnology)
        {
            if($id == $devTechnology->getId())
            {
                return $devTechnology->remove($key);
            }
        }

        return null;
    }

    public function addDevTechnology(DevTechnology $devTechnology) : void
    {
        $this->devTechnologies->add($devTechnology);
    }

    public function markAsUpdated(): void
    {
        $this->updatedOn = new \DateTime();
    }
}