<?php

namespace BestIt\Harvest\Models\Projects;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Projects
 *
 * @package BestIt\Harvest\Models\Projects
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Project offsetGet($offset)
 */
class Projects extends ModelCollection
{
    /**
     * Projects constructor.
     *
     * @param array $projects
     */
    public function __construct(array $projects)
    {
        $this->setData($projects, Project::class);
    }
}
