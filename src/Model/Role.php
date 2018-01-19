<?php

namespace BestIt\Harvest\Model;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class Role
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var Collection */
    protected $userIds;

    /** @var Carbon */
    protected $createdAt;

    /** @var Carbon */
    protected $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Role
     */
    public function setId(int $id): Role
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Role
     */
    public function setName(string $name): Role
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getUserIds(): Collection
    {
        return $this->userIds;
    }

    /**
     * @param Collection $userIds
     * @return Role
     */
    public function setUserIds(Collection $userIds): Role
    {
        $this->userIds = $userIds;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     * @return Role
     */
    public function setCreatedAt(Carbon $createdAt): Role
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     * @return Role
     */
    public function setUpdatedAt(Carbon $updatedAt): Role
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
