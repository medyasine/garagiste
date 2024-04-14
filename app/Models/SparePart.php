<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;
    protected $fillable = [
        'partName',
        'partReference',
        'supplier',
        'price',
    ];

    public function repairs()
    {
        return $this->belongsToMany(Repair::class)->withPivot('quantity');
}

}
