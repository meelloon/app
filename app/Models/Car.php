<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Part;

class Car extends Servis
{
    use HasFactory;

    public function part()
    {
        return $this->hasMany(Part::class);
    }
}
