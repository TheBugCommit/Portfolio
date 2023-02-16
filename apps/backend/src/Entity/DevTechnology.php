<?php

namespace App\Entity;

use Symfony\Component\Uid\Factory\UuidFactory;

class DevTechnology
{
    private string $id;
    private string $name;
    private string $link;
    private int $skillLevelPercent;

    public  function __construct(string $name, string $link, int $skillLevelPercent, private readonly UuidFactory $uuidFactory)
    {
        $this->id = $this->uuidFactory->create()->toRfc4122();
        $this->name = $name;
        $this->link = $link;
        $this->skillLevelPercent = $skillLevelPercent;
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
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return int
     */
    public function getSkillLevelPercent(): int
    {
        return $this->skillLevelPercent;
    }
}