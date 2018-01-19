<?php

namespace BestIt\Harvest\Model;

use Carbon\Carbon;

class Task
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var bool */
    protected $billableByDefault;

    /** @var float */
    protected $defaultHourlyRate;

    /** @var bool */
    protected $isDefault;

    /** @var bool */
    protected $isActive;

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
     * @return Task
     */
    public function setId(int $id): Task
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
     * @return Task
     */
    public function setName(string $name): Task
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBillableByDefault(): bool
    {
        return $this->billableByDefault;
    }

    /**
     * @param bool $billableByDefault
     * @return Task
     */
    public function setBillableByDefault(bool $billableByDefault): Task
    {
        $this->billableByDefault = $billableByDefault;
        return $this;
    }

    /**
     * @return float
     */
    public function getDefaultHourlyRate(): float
    {
        return $this->defaultHourlyRate;
    }

    /**
     * @param float $defaultHourlyRate
     * @return Task
     */
    public function setDefaultHourlyRate(float $defaultHourlyRate): Task
    {
        $this->defaultHourlyRate = $defaultHourlyRate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     * @return Task
     */
    public function setIsDefault(bool $isDefault): Task
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return Task
     */
    public function setIsActive(bool $isActive): Task
    {
        $this->isActive = $isActive;
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
     * @return Task
     */
    public function setCreatedAt(Carbon $createdAt): Task
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
     * @return Task
     */
    public function setUpdatedAt(Carbon $updatedAt): Task
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
