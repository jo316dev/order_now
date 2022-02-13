<?php

namespace App\Models;

use App\Accessors\DefaultAccessors;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, UuidTrait, DefaultAccessors;

    public $incrementing = false;

    protected $fillable = ['name', 'description'];


    public function search($filter = null)
    {

        return $this->where(function ($query) use ($filter) {

            $query->where('name', 'LIKE', "%{$filter}%");
            $query->orWhere('description', 'LIKE', "%{$filter}%");
        })->paginate(10);
    }
}
