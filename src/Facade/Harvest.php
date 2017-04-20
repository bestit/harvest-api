<?php

namespace BestIt\Harvest\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Harvest
 *
 * @package BestIt\Harvest\Facade
 */
class Harvest extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'harvest';
    }
}
