<?php

namespace BestIt\Harvest\Model;

use Carbon\Carbon;

class Contact
{
    /** @var int */
    private $id;
    /** @var Client */
    private $client;
    /** @var string */
    private $title;
    /** @var string */
    private $firstName;
    /** @var string */
    private $lastName;
    /** @var string */
    private $email;
    /** @var string */
    private $phoneOffice;
    /** @var string */
    private $phoneMobile;
    /** @var string */
    private $fax;
    /** @var Carbon */
    private $createdAt;
    /** @var Carbon */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contact
     */
    public function setId(int $id): Contact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return Contact
     */
    public function setClient(Client $client): Contact
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Contact
     */
    public function setTitle(string $title): Contact
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName(string $firstName): Contact
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Contact
     */
    public function setLastName(string $lastName): Contact
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneOffice(): string
    {
        return $this->phoneOffice;
    }

    /**
     * @param string $phoneOffice
     * @return Contact
     */
    public function setPhoneOffice(string $phoneOffice): Contact
    {
        $this->phoneOffice = $phoneOffice;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneMobile(): string
    {
        return $this->phoneMobile;
    }

    /**
     * @param string $phoneMobile
     * @return Contact
     */
    public function setPhoneMobile(string $phoneMobile): Contact
    {
        $this->phoneMobile = $phoneMobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Contact
     */
    public function setFax(string $fax): Contact
    {
        $this->fax = $fax;
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
     * @return Contact
     */
    public function setCreatedAt(Carbon $createdAt): Contact
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
     * @return Contact
     */
    public function setUpdatedAt(Carbon $updatedAt): Contact
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
