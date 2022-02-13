<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;

    protected $fillable = ['name', 'plan_id'];
}
