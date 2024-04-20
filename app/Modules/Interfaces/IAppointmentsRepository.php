<?php
namespace App\Modules\Interfaces;

use App\Modules\Entity\Appointments;
use Illuminate\Http\Request;

interface IPatientsRepository
{
    public function store(array $data, int $user_id) : Appointments;
}
