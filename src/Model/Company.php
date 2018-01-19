<?php

namespace BestIt\Harvest\Model;

class Company
{
    /** @var string */
    private $baseUri;

    /** @var string */
    private $fullDomain;

    /** @var string */
    private $name;

    /** @var bool */
    private $isActive;

    /** @var string */
    private $weekStartDay;

    /** @var bool */
    private $wantsTimestampTimers;

    /** @var string */
    private $timeFormat;

    /** @var string */
    private $planType;

    /** @var string */
    private $clock;

    /** @var string */
    private $decimalSymbol;

    /** @var string */
    private $thousandsSeparator;

    /** @var string */
    private $colorScheme;

    /** @var bool */
    private $expenseFeature;

    /** @var bool */
    private $invoiceFeature;

    /** @var bool */
    private $estimateFeature;

    /** @var bool */
    private $approvalFeature;

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     * @return Company
     */
    public function setBaseUri(string $baseUri): Company
    {
        $this->baseUri = $baseUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullDomain(): string
    {
        return $this->fullDomain;
    }

    /**
     * @param string $fullDomain
     * @return Company
     */
    public function setFullDomain(string $fullDomain): Company
    {
        $this->fullDomain = $fullDomain;
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
     * @return Company
     */
    public function setName(string $name): Company
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
     * @return Company
     */
    public function setIsActive(bool $isActive): Company
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeekStartDay(): string
    {
        return $this->weekStartDay;
    }

    /**
     * @param string $weekStartDay
     * @return Company
     */
    public function setWeekStartDay(string $weekStartDay): Company
    {
        $this->weekStartDay = $weekStartDay;
        return $this;
    }

    /**
     * @return bool
     */
    public function wantsTimestampTimers(): bool
    {
        return $this->wantsTimestampTimers;
    }

    /**
     * @param bool $wantsTimestampTimers
     * @return Company
     */
    public function setWantsTimestampTimers(bool $wantsTimestampTimers): Company
    {
        $this->wantsTimestampTimers = $wantsTimestampTimers;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }

    /**
     * @param string $timeFormat
     * @return Company
     */
    public function setTimeFormat(string $timeFormat): Company
    {
        $this->timeFormat = $timeFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlanType(): string
    {
        return $this->planType;
    }

    /**
     * @param string $planType
     * @return Company
     */
    public function setPlanType(string $planType): Company
    {
        $this->planType = $planType;
        return $this;
    }

    /**
     * @return string
     */
    public function getClock(): string
    {
        return $this->clock;
    }

    /**
     * @param string $clock
     * @return Company
     */
    public function setClock(string $clock): Company
    {
        $this->clock = $clock;
        return $this;
    }

    /**
     * @return string
     */
    public function getDecimalSymbol(): string
    {
        return $this->decimalSymbol;
    }

    /**
     * @param string $decimalSymbol
     * @return Company
     */
    public function setDecimalSymbol(string $decimalSymbol): Company
    {
        $this->decimalSymbol = $decimalSymbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getThousandsSeparator(): string
    {
        return $this->thousandsSeparator;
    }

    /**
     * @param string $thousandsSeparator
     * @return Company
     */
    public function setThousandsSeparator(string $thousandsSeparator): Company
    {
        $this->thousandsSeparator = $thousandsSeparator;
        return $this;
    }

    /**
     * @return string
     */
    public function getColorScheme(): string
    {
        return $this->colorScheme;
    }

    /**
     * @param string $colorScheme
     * @return Company
     */
    public function setColorScheme(string $colorScheme): Company
    {
        $this->colorScheme = $colorScheme;
        return $this;
    }

    /**
     * @return bool
     */
    public function expenseFeatureEnabled(): bool
    {
        return $this->expenseFeature;
    }

    /**
     * @param bool $expenseFeature
     * @return Company
     */
    public function setExpenseFeature(bool $expenseFeature): Company
    {
        $this->expenseFeature = $expenseFeature;
        return $this;
    }

    /**
     * @return bool
     */
    public function invoiceFeatureEnabled(): bool
    {
        return $this->invoiceFeature;
    }

    /**
     * @param bool $invoiceFeature
     * @return Company
     */
    public function setInvoiceFeature(bool $invoiceFeature): Company
    {
        $this->invoiceFeature = $invoiceFeature;
        return $this;
    }

    /**
     * @return bool
     */
    public function estimateFeatureEnabled(): bool
    {
        return $this->estimateFeature;
    }

    /**
     * @param bool $estimateFeature
     * @return Company
     */
    public function setEstimateFeature(bool $estimateFeature): Company
    {
        $this->estimateFeature = $estimateFeature;
        return $this;
    }

    /**
     * @return bool
     */
    public function approvalFeatureEnabled(): bool
    {
        return $this->approvalFeature;
    }

    /**
     * @param bool $approvalFeature
     * @return Company
     */
    public function setApprovalFeature(bool $approvalFeature): Company
    {
        $this->approvalFeature = $approvalFeature;
        return $this;
    }
}
