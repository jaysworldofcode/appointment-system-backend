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

    public function getPatient(int $id) : Patient{
        return $this->patients_repository->show($id);
    }

    public function savePatient(Request $request) : Patient{
        return $this->patients_repository->store(
            $request
        );
    }
}
