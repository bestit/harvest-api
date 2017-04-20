<?php

namespace BestIt\Harvest\Models\Projects;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Tasks
 *
 * @package BestIt\Harvest\Models\Projects
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Task offsetGet($offset)
 */
class Tasks extends ModelCollection
{
    /**
     * Tasks constructor.
     *
     * @param array $tasks
     */
    public function __construct(array $tasks)
    {
        $this->setData($tasks, Task::class);
    }
}
