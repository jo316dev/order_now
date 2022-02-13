<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, UuidTrait;

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
