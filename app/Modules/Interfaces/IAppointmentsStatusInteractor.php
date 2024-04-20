<?php
namespace App\Modules\Interfaces;

use App\Modules\Entity\AppointmentsStatus;
use Illuminate\Http\Request;

interface IAppointmentsStatusInteractor
{
    public function __construct(IAppointmentsStatusRepository $appointments_status_repository);

    public function getStatus(int $id, int $user_id) : AppointmentsStatus;
}
