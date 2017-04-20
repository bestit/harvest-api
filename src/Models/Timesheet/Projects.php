<?php

namespace BestIt\Harvest\Models\Timesheet;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Projects
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Project offsetGet($offset)
 */
class Projects extends ModelCollection
{
    public function __construct(array $projects)
    {
        $this->setData($projects, Project::class);
    }
}
