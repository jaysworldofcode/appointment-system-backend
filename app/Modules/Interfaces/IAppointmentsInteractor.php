<?php
namespace App\Modules\Interfaces;

use App\Modules\Entity\Appointments;
use App\Modules\Repository\AppointmentsStatusRepository;
use Illuminate\Http\Request;

interface IAppointmentsInteractor
{
    public function __construct(
        IAppointmentsRepository $appointments_repository,
        IAppointmentsStatusRepository $appointment_status_repository);

    public function getAppointment(int $id, int $user_id) : Appointments;

    public function saveAppointment(array $data, int $user_id) : Appointments;

    public function updateAppointment(array $data, int $user_id) : Appointments;
    public function filterAppointments(array $filter, int $user_id) : array;
    public function deleteAppointments(int $id, int $user_id);
}
