<?php

namespace BestIt\Harvest\Models\Timesheet;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Task
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Task extends BaseModel
{
    public $id;
    public $name;
    public $billable;
}
