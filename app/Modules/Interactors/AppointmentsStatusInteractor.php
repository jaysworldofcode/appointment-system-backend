<?php


namespace App\Modules\Interactors;

use App\Modules\Entity\AppointmentsStatus;
use App\Modules\Interfaces\IAppointmentsStatusInteractor;
use App\Modules\Interfaces\IAppointmentsStatusRepository;
use Illuminate\Http\Request;

class AppointmentsStatusInteractor implements IAppointmentsStatusInteractor
{
    private $appointments_status_repository;

    public function __construct(IAppointmentsStatusRepository $appointments_status_repository){
        $this->appointments_status_repository = $appointments_status_repository;
    }

    public function getStatus(int $id, int $user_id) : AppointmentsStatus{
        return $this->appointments_status_repository->show($id, $user_id);
    }
}
