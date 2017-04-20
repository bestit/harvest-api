<?php

namespace BestIt\Harvest\Models\Users;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class User
 *
 * @package BestIt\Harvest\Models\Users
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class User extends BaseModel
{
    /** @var int $id */
    public $id;

    /** @var string $email */
    public $email;

    public $isAdmin;

    /** @var bool $active */
    public $isActive;

    public $firstName;
    public $lastName;
    public $timezone;
    public $isContractor;
    public $telephone;
    public $hasAccessToAllFutureProjects;
    public $defaultHourlyRate;
    public $department;
    public $wantsNewsletter;
    public $costRate;
    public $identityAccountId;
    public $identityUserId;

    /** @var string $createdAt */
    public $createdAt;

    /** @var string $updatedAt */
    public $updatedAt; //TODO: datetime
}
