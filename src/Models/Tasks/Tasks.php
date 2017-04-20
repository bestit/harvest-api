<?php

namespace BestIt\Harvest\Models\Tasks;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Tasks
 *
 * @package BestIt\Harvest\Models
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Task offsetGet($offset)
 */
class Tasks extends ModelCollection
{
    public function __construct(array $users)
    {
        $this->setData($users, Task::class);
    }
}
