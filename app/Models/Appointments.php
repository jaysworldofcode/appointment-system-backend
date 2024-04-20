<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'patients',
        'schedule_datetime',
        'status_id',
        'notes'
    ];
}
