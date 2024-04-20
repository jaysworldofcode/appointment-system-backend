<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\AppointmentsStatus;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'patients_id',
        'schedule_datetime',
        'status_id',
        'notes'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patients_id');
    }

    public function status(){
        return $this->belongsTo(AppointmentsStatus::class, 'status_id');
    }
}
