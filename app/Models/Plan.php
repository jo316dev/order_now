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

    public function search($filter = null)
    {

        return $this->where(function ($query) use ($filter) {

            $query->where('name', 'LIKE', "%{$filter}%");
            $query->orWhere('description', 'LIKE', "%{$filter}%");
            $query->orWhere('price', 'LIKE', "%{$filter}%");
        })->paginate(10);
    }
}
