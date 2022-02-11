<?php

namespace App\Accessors;

trait DefaultAccessors
{
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPriceAttribute($value)
    {
        setlocale(LC_MONETARY, "pt_BR");

        return money_format('$%i', $value);
    }
}
