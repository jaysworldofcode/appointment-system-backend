<?php


namespace App\Modules\Interactors;

use App\Modules\Entity\Appointments;
use App\Modules\Interfaces\IAppointmentsInteractor;
use App\Modules\Interfaces\IAppointmentsRepository;
use App\Modules\Interfaces\IAppointmentsStatusRepository;
use Illuminate\Http\Request;

class AppointmentsInteractor implements IAppointmentsInteractor
{
    private $appointments_repository,
            $appointments_status_repository;

    public function __construct(
            IAppointmentsRepository $appointments_repository,
            IAppointmentsStatusRepository $appointments_status_repository){
        $this->appointments_repository = $appointments_repository;
        $this->appointments_status_repository = $appointments_status_repository;
    }

    public function getAppointment(int $id, int $user_id) : Appointments{
        return $this->appointments_repository->show($id, $user_id);
    }

    public function saveAppointment(array $data, int $user_id) : Appointments{
        return $this->appointments_repository->store($data, $user_id);
    }

    public function updateAppointment(array $data, int $user_id) : Appointments{
        if(isset($data['status_id'])){
            # validate status_id if exists
            $this->appointments_status_repository->show(
                $data['status_id'],
                $user_id
            );
        }

        return $this->appointments_repository->update(
            $data,
            $user_id
        );
    }

    public function filterAppointments(array $filter, int $user_id) : array{
        return $this->appointments_repository->filter($filter, $user_id);
    }

    public function deleteAppointments(int $id, int $user_id){
        return $this->appointments_repository->delete($id, $user_id);
    }
}
