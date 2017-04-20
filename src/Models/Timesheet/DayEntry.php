<?php

namespace BestIt\Harvest\Models\Timesheet;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class DayEntry
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class DayEntry extends BaseModel
{
    public $id;
    public $userId;
    public $spentAt;
    public $createdAt;
    public $updatedAt;
    public $projectId;
    public $taskId;
    public $project;
    public $task;
    public $client;
    public $notes;
    public $hoursWithoutTimer;
    public $hours;
}
