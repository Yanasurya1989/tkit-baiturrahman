<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'paragraph_1',
        'paragraph_2',
        'button_text',
        'button_link',
        'user_name',
        'user_title',
        'user_image',
        'image_1',
        'image_2',
        'image_3',
        'is_active',
    ];
}
