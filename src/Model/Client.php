<?php

namespace BestIt\Harvest\Model;

use Carbon\Carbon;

class Client
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var bool */
    protected $isActive;
    /** @var string */
    protected $address;
    /** @var string */
    protected $currency;
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
     * @return Client
     */
    public function setId(int $id): Client
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
     * @return Client
     */
    public function setName(string $name): Client
    {
        $this->name = $name;
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
     * @return Client
     */
    public function setIsActive(bool $isActive): Client
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Client
     */
    public function setAddress(string $address): Client
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Client
     */
    public function setCurrency(string $currency): Client
    {
        $this->currency = $currency;
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
     * @return Client
     */
    public function setCreatedAt(Carbon $createdAt): Client
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
     * @return Client
     */
    public function setUpdatedAt(Carbon $updatedAt): Client
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
