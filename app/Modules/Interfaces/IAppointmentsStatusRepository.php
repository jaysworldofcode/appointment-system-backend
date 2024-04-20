<?php
namespace App\Modules\Interfaces;

use App\Modules\Entity\AppointmentsStatus;
use Illuminate\Http\Request;

interface IAppointmentsStatusRepository
{
    public function show(int $id, int $user_id) : AppointmentsStatus;
}
