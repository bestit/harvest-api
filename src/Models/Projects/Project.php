<?php

namespace BestIt\Harvest\Models\Projects;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Project
 *
 * @package BestIt\Harvest\Models\Projects
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Project extends BaseModel
{
    public $id;
    public $clientId;
    public $name;
    public $code;
    public $active;
    public $billable;
    public $billBy;
    public $hourlyRate;
    public $budget;
    public $budgetBy;
    public $notifyWhenOverBudget;
    public $overBudgetNotificationPercentage;
    public $overBudgetNotifiedAt;
    public $showBudgetToAll;
    public $createdAt;
    public $updatedAt;
    public $startsOn;
    public $endsOn;
    public $estimate;
    public $estimateBy;
    public $hintEarliestRecordAt;
    public $hintLatestRecordAt;
    public $notes;
    public $costBudget;
    public $costBudgetIncludeExpenses;
}
