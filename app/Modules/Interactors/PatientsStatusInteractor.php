<?php


namespace App\Modules\Interactors;

use App\Modules\Entity\PatientsStatus;
use App\Modules\Interfaces\IPatientsStatusInteractor;
use App\Modules\Interfaces\IPatientsStatusRepository;
use Illuminate\Http\Request;

class PatientsStatusInteractor implements IPatientsStatusInteractor
{
    private $patients_repository;

    public function __construct(IPatientsStatusRepository $patients_repository){
        $this->patients_repository = $patients_repository;
    }

    public function getStatus(int $id, int $user_id) : PatientsStatus{
        return $this->patients_repository->show($id, $user_id);
    }
}
