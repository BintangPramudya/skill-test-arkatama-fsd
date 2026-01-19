<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    protected $fillable = [
        'owner_id',
        'code',
        'name',
        'type',
        'age',
        'weight'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function checkups()
    {
        return $this->hasMany(Checkup::class);
    }

    protected static function booted()
    {
        static::creating(function ($pet) {
            $time = now()->format('Hi');
            $owner = str_pad($pet->owner_id, 4, '0', STR_PAD_LEFT);
            $order = str_pad(Pet::count() + 1, 4, '0', STR_PAD_LEFT);

            $pet->code = $time . $owner . $order;
        });
    }
}
