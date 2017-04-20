<?php

namespace BestIt\Harvest\Models\Contacts;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Contact
 *
 * @package BestIt\Harvest\Models\Contacts
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Contact extends BaseModel
{
    /** @var int $id */
    public $id;
    /** @var int $clientId */
    public $clientId;
    /** @var string $firstName */
    public $firstName;
    /** @var string $lastName */
    public $lastName;
    /** @var string $email */
    public $email;
    /** @var string $phoneOffice */
    public $phoneOffice;
    /** @var string $phoneMobile */
    public $phoneMobile;
    /** @var string $fax */
    public $fax;
    /** @var string $title */
    public $title;
    /** @var string $createdAt */
    public $createdAt;
    /** @var string $updatedAt */
    public $updatedAt; //TODO: datetime
}
