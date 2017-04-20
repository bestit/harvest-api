<?php

namespace BestIt\Harvest\Models\Timesheet;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Tasks
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Task offsetGet($offset)
 */
class Tasks extends ModelCollection
{
    public function __construct(array $tasks)
    {
        $this->setData($tasks, Task::class);
    }
}
