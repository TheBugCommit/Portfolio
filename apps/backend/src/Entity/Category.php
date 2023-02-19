<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Factory\UuidFactory;

class Category
{
    private string $id;
    private string $name;
    private ?string $description;
    private string $icon;
    private UuidFactory $uuidFactory;

    public function __construct(string $name, string $icon, ?string $description)
    {
        $this->uuidFactory = new UuidFactory();
        $this->id = $this->uuidFactory->create()->toRfc4122();
        $this->name = $name;
        $this->description = $description;
        $this->icon = $icon;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
}