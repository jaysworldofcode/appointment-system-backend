<?php


namespace App\Modules\Interactors;

use App\Modules\Entity\Patient;
use App\Modules\Interfaces\IPatientsInteractor;
use App\Modules\Interfaces\IPatientsRepository;
use Illuminate\Http\Request;

class PatientsInteractor implements IPatientsInteractor
{
    private $patients_repository;

    public function __construct(IPatientsRepository $patients_repository){
        $this->patients_repository = $patients_repository;
    }

    public function getPatient(int $id, int $user_id) : Patient{
        return $this->patients_repository->show($id, $user_id);
    }

    public function savePatient(Request $request, int $user_id) : Patient{
        return $this->patients_repository->store(
            $request,
            $user_id
        );
    }

    public function deletePatient($id, int $user_id){
        return $this->patients_repository->delete(
            $id,
            $user_id
        );
    }

    public function setStatus(int $id, int $status_id, int $user_id) : Patient{
        return $this->patients_repository->setStatus(
            $id,
            $status_id,
            $user_id
        );
    }

    public function updatePatient(array $data, int $user_id) : Patient{
        return $this->patients_repository->update(
            $data,
            $user_id
        );
    }
}
