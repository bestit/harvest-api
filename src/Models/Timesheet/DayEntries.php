<?php

namespace BestIt\Harvest\Models\Timesheet;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class DayEntries
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method DayEntry offsetGet($offset)
 */
class DayEntries extends ModelCollection
{
    public function __construct(array $entries)
    {
        $this->setData($entries, DayEntry::class);
    }
}
