<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'color_class',
        'is_active',
    ];
}
