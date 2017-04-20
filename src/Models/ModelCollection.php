<?php

namespace BestIt\Harvest\Models;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * Class ModelCollection
 *
 * @package BestIt\Harvest\Models
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
abstract class ModelCollection implements ArrayAccess, IteratorAggregate, Countable
{
    private $data = [];

    /**
     * Set the data for the collection.
     *
     * @param array $data
     * @param string $class
     */
    protected function setData(array $data, $class)
    {
        foreach ($data as $key => $value) {
            $tempData = new $class($value);

            $this->data[$tempData->id] = $tempData;
        }
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->data);
    }

    /**
     * Convert the collection to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
