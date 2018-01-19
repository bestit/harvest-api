<?php

namespace BestIt\Harvest\Transformer;

use BestIt\Harvest\Helper\HasParseableProperties;
use Illuminate\Support\Collection;

abstract class BaseTransformer implements Transformer
{
    use HasParseableProperties;

    abstract public function modelClass(): string;

    public function transform(Collection $data)
    {
        $modelClass = $this->modelClass();
        $model = new $modelClass();

        $data->reject(function ($item) {
            return $item === null;
        })->each(function ($item, $key) use ($model) {
            $setter = static::setterName($key);

            $model->{$setter}(static::parse($item, $key));
        });

        return $model;
    }
}
