<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name', 'phone', 'phone_verified_at'];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
