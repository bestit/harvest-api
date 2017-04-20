<?php

namespace BestIt\Harvest\Models\Clients;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Client
 *
 * @package BestIt\Harvest\Models\Clients
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Client extends BaseModel
{
    /** @var int $id */
    public $id;
    /** @var string $name */
    public $name;
    /** @var bool $active */
    public $active;
    /** @var string $currency */
    public $currency;
    /** @var int $highriseId */
    public $highriseId;
    public $cacheVersion;
    /** @var string $updatedAt */
    public $updatedAt; //TODO: datetime
    /** @var string $createdAt */
    public $createdAt;
    /** @var string $currencySymbol */
    public $currencySymbol;
    /** @var string $details */
    public $details;
    /** @var int $defaultInvoiceTimeframe */
    public $defaultInvoiceTimeframe;
    /** @var  TODO: find out what type */
    public $lastInvoiceKind;
}
