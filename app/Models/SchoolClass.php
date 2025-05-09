<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'title',
        'teacher_name',
        'teacher_image',
        'class_image',
        'price',
        'age_range',
        'time',
        'capacity',
        'description',
        'status'
    ];
}
