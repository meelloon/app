<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Car;

class Part extends Servis
{
    use HasFactory;

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
