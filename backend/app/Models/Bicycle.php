<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    protected $fillable = [
        "name", "wheel_size", "gears", 'sex', "type", "size", "color", "manufacturer_id"
    ];
    use HasFactory;
}
