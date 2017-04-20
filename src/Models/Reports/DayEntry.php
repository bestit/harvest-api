<?php

namespace BestIt\Harvest\Models\Reports;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class DayEntry
 *
 * @package BestIt\Harvest\Models\Reports
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class DayEntry extends BaseModel
{
    public $id;
    public $notes;
    public $spentAt;
    public $hours;
    public $userId;
    public $projectId;
    public $taskId;
    public $createdAt;
    public $updatedAt;
    public $adjustmentRecord;
    public $timerStartedAt;
    public $isClosed;
    public $isBilled;
    public $hoursWithoutTimer;
}
