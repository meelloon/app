<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servis extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function search($string)
    {
        return self::where('name', 'like', '%' . $string . '%')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
