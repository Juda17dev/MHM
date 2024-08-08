<?php

namespace App\Traits;

trait EnumValuesTrait{
    public static function values():array{
        $values = [];
        foreach (self::cases() as $case) {
            $values[] = $case->value;
        }
        return $values;
    }
}