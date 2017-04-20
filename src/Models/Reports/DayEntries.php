<?php

namespace BestIt\Harvest\Models\Reports;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class DayEntries
 *
 * @package BestIt\Harvest\Models\Reports
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method DayEntry offsetGet($offset)
 */
class DayEntries extends ModelCollection
{
    /**
     * DayEntries constructor.
     *
     * @param array $dayEntries
     */
    public function __construct(array $dayEntries)
    {
        $this->setData($dayEntries, DayEntry::class);
    }
}
