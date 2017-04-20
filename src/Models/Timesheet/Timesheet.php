<?php

namespace BestIt\Harvest\Models\Timesheet;

/**
 * Class Timesheet
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Timesheet
{
    public $dayEntries;
    public $projects;

    /**
     * BaseModel constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (array_key_exists('day_entries', $data)) {
            $this->dayEntries = new DayEntries($data['day_entries']);
        }

        if (array_key_exists('projects', $data)) {
            $this->projects = new Projects($data['projects']);
        }
    }
}
