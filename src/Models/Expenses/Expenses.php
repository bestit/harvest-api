<?php

namespace BestIt\Harvest\Models\Expenses;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Expenses
 *
 * @package BestIt\Harvest\Models\Expenses
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Expense offsetGet($offset)
 */
class Expenses extends ModelCollection
{
    /**
     * Expenses constructor.
     *
     * @param array $expenses
     */
    public function __construct(array $expenses)
    {
        $this->setData($expenses, Expense::class);
    }
}
