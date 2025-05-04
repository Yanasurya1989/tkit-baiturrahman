<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heros';
    protected $fillable = [
        'title',
        'description',
        'image',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'is_active'
    ];
}
