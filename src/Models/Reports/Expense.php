<?php

namespace BestIt\Harvest\Models\Reports;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Expense
 *
 * @package BestIt\Harvest\Models\Reports
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Expense extends BaseModel
{
    public $id;
    public $totalCost;
    public $units;
    public $createdAt;
    public $updatedAt;
    public $projectId;
    public $expenseCategoryId;
    public $userId;
    public $spentAt;
    public $isClosed;
    public $notes;
    public $invoiceId;
    public $billable;
    public $companyId;
    public $hasReceipt;
    public $isLocked;
    public $lockedReason;
}
