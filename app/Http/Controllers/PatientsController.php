<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Modules\Interactors\PatientsInteractor;
use App\Modules\Repository\PatientsRepository;

class PatientsController extends Controller
{
    private $patients_interactor;

    public function __construct(PatientsRepository $patients_repository)
    {
        $this->patients_interactor = new PatientsInteractor(
            $patients_repository
        );
    }

    public function show($id){
        $patient = $this->patients_interactor->getPatient($id);

        return response(
            $patient->getJSON(),
            200
        );
    }
}
