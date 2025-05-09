<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'gurdian_name',
        'gurdian_email',
        'child_name',
        'child_age',
        'message',
    ];
}
