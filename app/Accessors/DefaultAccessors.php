<?php

namespace App\Accessors;

trait DefaultAccessors
{
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAtribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
