<?php

namespace BestIt\Harvest\Utils;

use DateTime;

/**
 * Class Utils
 *
 * @package BestIt\Harvest\Utils
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Utils
{
    /**
     * Convert camelCase string to snake_case string.
     *
     * @param string $input
     * @return string
     */
    public static function fromCamelCaseToSnakeCase($input)
    {
        preg_match_all('/([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)/', $input, $matches);
        $ret = $matches[0];

        foreach ($ret as &$match) {
            $match = $match === strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode('_', $ret);
    }

    /**
     * Convert snake_case to camelCase.
     *
     * @param string $string
     * @param bool $capitalizeFirstCharacter
     * @return string
     */
    public static function snakeCaseToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    public static function appendUpdatedSinceToUri($uri, DateTime $dateTime = null)
    {
        if ($dateTime === null) {
            return $uri;
        }

        return $uri . '?updated_since=' . static::dateTimeObjToHarvestTimeString($dateTime);
    }

    /**
     * Format date time object to string in the format harvest needs it.
     *
     * @param DateTime $dateTime
     * @return string
     */
    public static function dateTimeObjToHarvestTimeString(DateTime $dateTime)
    {
        return $dateTime->format('Y-m-d H:i');
    }
}
