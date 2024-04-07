<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'fuelType',
        'registration',
        'photos',
        'userId'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
}
