<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsStatus extends Model
{
    public $table = 'patients_status';
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];
}
