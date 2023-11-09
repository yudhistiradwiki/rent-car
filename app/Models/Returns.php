<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Returns extends Model
{
    use HasFactory;

    protected $fillable = ['rental_id', 'return_date', 'total_days', 'total_cost'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
