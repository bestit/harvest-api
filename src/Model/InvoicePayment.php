<?php

namespace BestIt\Harvest\Model;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class InvoicePayment
{
    /** @var int */
    private $id;

    /** @var float */
    private $amount;

    /** @var Carbon */
    private $paidAt;

    /** @var string */
    private $recordedBy;

    /** @var string */
    private $recordedByEmail;

    /** @var string */
    private $notes;

    /** @var string */
    private $transactionId;

    /** @var Collection */
    private $paymentGateway;

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
     * @return InvoicePayment
     */
    public function setId(int $id): InvoicePayment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return InvoicePayment
     */
    public function setAmount(float $amount): InvoicePayment
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getPaidAt(): Carbon
    {
        return $this->paidAt;
    }

    /**
     * @param Carbon $paidAt
     * @return InvoicePayment
     */
    public function setPaidAt(Carbon $paidAt): InvoicePayment
    {
        $this->paidAt = $paidAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordedBy(): string
    {
        return $this->recordedBy;
    }

    /**
     * @param string $recordedBy
     * @return InvoicePayment
     */
    public function setRecordedBy(string $recordedBy): InvoicePayment
    {
        $this->recordedBy = $recordedBy;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordedByEmail(): string
    {
        return $this->recordedByEmail;
    }

    /**
     * @param string $recordedByEmail
     * @return InvoicePayment
     */
    public function setRecordedByEmail(string $recordedByEmail): InvoicePayment
    {
        $this->recordedByEmail = $recordedByEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return InvoicePayment
     */
    public function setNotes(string $notes): InvoicePayment
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return InvoicePayment
     */
    public function setTransactionId(string $transactionId): InvoicePayment
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getPaymentGateway(): Collection
    {
        return $this->paymentGateway;
    }

    /**
     * @param Collection $paymentGateway
     * @return InvoicePayment
     */
    public function setPaymentGateway(Collection $paymentGateway): InvoicePayment
    {
        $this->paymentGateway = $paymentGateway;
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
     * @return InvoicePayment
     */
    public function setCreatedAt(Carbon $createdAt): InvoicePayment
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
     * @return InvoicePayment
     */
    public function setUpdatedAt(Carbon $updatedAt): InvoicePayment
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
