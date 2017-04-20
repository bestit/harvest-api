<?php

namespace BestIt\Harvest\Models\Expenses;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Categories
 *
 * @package BestIt\Harvest\Models\Expenses
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Category offsetGet($offset)
 */
class Categories extends ModelCollection
{
    /**
     * Categories constructor.
     *
     * @param array $expenseCategories
     */
    public function __construct(array $expenseCategories)
    {
        $this->setData($expenseCategories, Category::class);
    }
}
