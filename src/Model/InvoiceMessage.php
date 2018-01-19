<?php

namespace BestIt\Harvest\Model;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class InvoiceMessage
{
    /** @var int */
    private $id;

    /** @var string */
    private $sentBy;

    /** @var string */
    private $sentByEmail;

    /** @var string */
    private $sentFrom;

    /** @var string */
    private $sentFromEmail;

    /** @var Collection */
    private $recipients;

    /** @var string */
    private $subject;

    /** @var string */
    private $body;

    /** @var bool */
    private $includeLinkToClientInvoice;

    /** @var bool */
    private $attachPdf;

    /** @var bool */
    private $sendMeACopy;

    /** @var bool */
    private $thankYou;

    /** @var string TODO: notify harvest wrong type */
    private $eventType;

    /** @var bool */
    private $reminder;

    /** @var Carbon */
    private $sendReminderOn;

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
     * @return InvoiceMessage
     */
    public function setId(int $id): InvoiceMessage
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSentBy(): string
    {
        return $this->sentBy;
    }

    /**
     * @param string $sentBy
     * @return InvoiceMessage
     */
    public function setSentBy(string $sentBy): InvoiceMessage
    {
        $this->sentBy = $sentBy;
        return $this;
    }

    /**
     * @return string
     */
    public function getSentByEmail(): string
    {
        return $this->sentByEmail;
    }

    /**
     * @param string $sentByEmail
     * @return InvoiceMessage
     */
    public function setSentByEmail(string $sentByEmail): InvoiceMessage
    {
        $this->sentByEmail = $sentByEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getSentFrom(): string
    {
        return $this->sentFrom;
    }

    /**
     * @param string $sentFrom
     * @return InvoiceMessage
     */
    public function setSentFrom(string $sentFrom): InvoiceMessage
    {
        $this->sentFrom = $sentFrom;
        return $this;
    }

    /**
     * @return string
     */
    public function getSentFromEmail(): string
    {
        return $this->sentFromEmail;
    }

    /**
     * @param string $sentFromEmail
     * @return InvoiceMessage
     */
    public function setSentFromEmail(string $sentFromEmail): InvoiceMessage
    {
        $this->sentFromEmail = $sentFromEmail;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getRecipients(): Collection
    {
        return $this->recipients;
    }

    /**
     * @param Collection $recipients
     * @return InvoiceMessage
     */
    public function setRecipients(Collection $recipients): InvoiceMessage
    {
        $this->recipients = $recipients;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return InvoiceMessage
     */
    public function setSubject(string $subject): InvoiceMessage
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return InvoiceMessage
     */
    public function setBody(string $body): InvoiceMessage
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return bool
     */
    public function includeLinkToClientInvoice(): bool
    {
        return $this->includeLinkToClientInvoice;
    }

    /**
     * @param bool $includeLinkToClientInvoice
     * @return InvoiceMessage
     */
    public function setIncludeLinkToClientInvoice(bool $includeLinkToClientInvoice): InvoiceMessage
    {
        $this->includeLinkToClientInvoice = $includeLinkToClientInvoice;
        return $this;
    }

    /**
     * @return bool
     */
    public function shouldAttachPdf(): bool
    {
        return $this->attachPdf;
    }

    /**
     * @param bool $attachPdf
     * @return InvoiceMessage
     */
    public function setAttachPdf(bool $attachPdf): InvoiceMessage
    {
        $this->attachPdf = $attachPdf;
        return $this;
    }

    /**
     * @return bool
     */
    public function shouldSendMeACopy(): bool
    {
        return $this->sendMeACopy;
    }

    /**
     * @param bool $sendMeACopy
     * @return InvoiceMessage
     */
    public function setSendMeACopy(bool $sendMeACopy): InvoiceMessage
    {
        $this->sendMeACopy = $sendMeACopy;
        return $this;
    }

    /**
     * @return bool
     */
    public function isThankYouNote(): bool
    {
        return $this->thankYou;
    }

    /**
     * @param bool $thankYou
     * @return InvoiceMessage
     */
    public function setThankYou(bool $thankYou): InvoiceMessage
    {
        $this->thankYou = $thankYou;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     * @return InvoiceMessage
     */
    public function setEventType(string $eventType): InvoiceMessage
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReminderMessage(): bool
    {
        return $this->reminder;
    }

    /**
     * @param bool $reminder
     * @return InvoiceMessage
     */
    public function setReminder(bool $reminder): InvoiceMessage
    {
        $this->reminder = $reminder;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getSendReminderOn()
    {
        return $this->sendReminderOn;
    }

    /**
     * @param Carbon $sendReminderOn
     * @return InvoiceMessage
     */
    public function setSendReminderOn(Carbon $sendReminderOn): InvoiceMessage
    {
        $this->sendReminderOn = $sendReminderOn;
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
     * @return InvoiceMessage
     */
    public function setCreatedAt(Carbon $createdAt): InvoiceMessage
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
     * @return InvoiceMessage
     */
    public function setUpdatedAt(Carbon $updatedAt): InvoiceMessage
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
