<?php

namespace BestIt\Harvest\Models\Tasks;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Task
 *
 * @package BestIt\Harvest\Models\Tasks
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Task extends BaseModel
{
    /** @var int $id */
    public $id;
    public $name;
    public $billableByDefault;
    public $defaultHourlyRate;
    public $isDefault;
    public $deactivated;
    /** @var string $createdAt */
    public $createdAt;
    /** @var string $updatedAt */
    public $updatedAt; //TODO: datetime
}
