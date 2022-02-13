<?php

namespace App\Models;

use App\Accessors\DefaultAccessors;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory, UuidTrait, DefaultAccessors;

    public $incrementing = false;

    protected $fillable = ['name', 'plan_id'];
}
