<?php

namespace BestIt\Harvest\Models\Timesheet;

use BestIt\Harvest\Utils\Utils;

/**
 * Class Project
 *
 * @package BestIt\Harvest\Models\Timesheet
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Project
{
    public $id;
    public $name;
    public $billable;
    public $code;
    public $tasks;
    public $client;
    public $clientId;
    public $canManage;
    public $clientCurrency;
    public $clientCurrencySymbol;

    public function __construct(array $project)
    {
        $reflection = new \ReflectionObject($this);

        foreach ($project as $key => $value) {
            $property = Utils::snakeCaseToCamelCase($key);

            if (!$reflection->hasProperty($property)) {
                continue;
            }

            if ($property === 'tasks') {
                $value = new Tasks($value);
            }

            $this->$property = $value;
        }
    }
}
