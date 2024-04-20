<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentsStatus extends Model
{
    public $table = 'appointments_status';
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];
}
