<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/NavbarItem.php
class NavbarItem extends Model
{
    protected $fillable = ['title', 'url', 'type', 'parent_id', 'order', 'is_active'];

    public function children()
    {
        return $this->hasMany(NavbarItem::class, 'parent_id')->where('is_active', true)->orderBy('order');
    }

    public function parent()
    {
        return $this->belongsTo(NavbarItem::class, 'parent_id');
    }
}
