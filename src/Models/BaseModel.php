<?php

namespace BestIt\Harvest\Models;

use BestIt\Harvest\Utils\Utils;
use ReflectionObject;
use ReflectionProperty;

/**
 * Class BaseModel
 *
 * @package BestIt\Harvest\Models
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
abstract class BaseModel
{
    /**
     * BaseModel constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $property = Utils::snakeCaseToCamelCase($key);

            if (!property_exists($this, $property)) {
                continue;
            }

            $this->{$property} = $value;
        }
    }

    /**
     * Convert model to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $reflection = new ReflectionObject($this);
        $data = [];

        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $property = $property->getName();

            $data[Utils::fromCamelCaseToSnakeCase($property)] = $this->$property;
        }

        return $data;
    }
}
