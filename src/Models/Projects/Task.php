<?php

namespace BestIt\Harvest\Models\Projects;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Task
 *
 * @package BestIt\Harvest\Models\Projects
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Task extends BaseModel
{
    public $id;
    public $projectId;
    public $taskId;
    public $billable;
    public $deactivated;
    public $hourlyRate;
    public $budget;
    public $estimate;
    public $createdAt;
    public $updatedAt;
}
