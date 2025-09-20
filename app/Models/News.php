<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news'; // pastikan nama tabel benar
    protected $fillable = ['title', 'content', 'image']; //

}
