<?php

namespace BestIt\Harvest\Models\Expenses;

use BestIt\Harvest\Models\BaseModel;

/**
 * Class Category
 *
 * @package BestIt\Harvest\Models\Expenses
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Category extends BaseModel
{
    public $id;
    public $name;
    public $unitName;
    public $unitPrice;
    public $createdAt;
    public $updatedAt;
    public $deactivated;
}
