<?php

namespace App\Models\Traits;


trait StatusConstantTrait
{
    static $ACTIVE = 1;
    static $INACTIVE = 0;


    /**
     * @param $status
     * @return string|void
     */
    public static function getLabel($status): string
    {
        return match ($status) {
            self::$ACTIVE => "Active",
            self::$INACTIVE => "In-active",
            default => ""
        };
    }

    /**
     * @param $status
     * @return string
     */
    public static function getClass($status): string
    {
        return match ($status) {
            self::$ACTIVE => "bg-success",
            self::$INACTIVE => "bg-danger",
            default => ""
        };
    }
}
