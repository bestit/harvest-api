<?php

namespace BestIt\Harvest\Helper;

use Carbon\Carbon;
use Illuminate\Support\Collection;

trait HasParseableProperties
{
    public static function setterName(string $key): string
    {
        return 'set' . ucfirst(Str::camel($key));
    }

    public static function parse($item, string $key)
    {
        if (static::isDateTimeProperty($key)) {
            return Carbon::parse($item);
        }

        if (static::isModel($key)) {
            $transformer = '\BestIt\Harvest\Transformer\\' . ucfirst($key);
            return (new $transformer())->transform(collect($item));
        }

        if (static::isArray($key)) {
            return Collection::make($item);
        }

        return $item;
    }

    public static function isIntProperty(string $key): bool
    {
        return \in_array($key, [
            'id'
        ]);
    }

    public static function isBooleanProperty($key): bool
    {
        return \in_array($key, [
            'is_active'
        ]);
    }

    public static function isDateTimeProperty($key): bool
    {
        return \in_array($key, [
            'created_at',
            'updated_at',
            'send_reminder_on',
            'paid_at'
        ], true);
    }

    public static function isModel($key): bool
    {
        return \in_array($key, [
            'client',
        ], true);
    }

    public static function isArray($key): bool
    {
        return \in_array($key, [
            'recipients',
            'payment_gateway',
            'user_ids'
        ], true);
    }
}
