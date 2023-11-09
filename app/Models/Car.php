<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'brand',
        'model',
        'license_plate',
        'daily_rate',
        'file',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
