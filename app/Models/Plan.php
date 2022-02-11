<?php

namespace App\Models;

use App\Accessors\DefaultAccessors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory, DefaultAccessors;



    protected $fillable = ['name', 'description', 'price', 'url'];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
