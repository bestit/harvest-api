<?php

namespace BestIt\Harvest\Models\Projects;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class User
 *
 * @package BestIt\Harvest\Models\Projects
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class User extends BaseModel
{
    public $id;
    public $projectId;
    public $userId;
    public $is_project_manager;
    public $deactivated;
    public $hourlyRate;
    public $budget;
    public $estimate;
    public $createdAt;
    public $updatedAt;
}
