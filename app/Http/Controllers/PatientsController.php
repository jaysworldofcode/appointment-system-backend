<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Modules\Interactors\PatientsInteractor;
use App\Modules\Repository\PatientsRepository;
use App\Http\Requests\NewPatientRequest;

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

    public function store(NewPatientRequest $request){
        try {
            $patient = $this->patients_interactor->savePatient(
                $request
            );

            return response(
                $patient->getJSON(),
                200
            );
        } catch (\Exception $e) {
            if(env('APP_ENV') == 'local'){
                return response(
                    $e,
                    400
                );
            }else{
                return response(
                    'Failed to add patient, encounter an issue. Please contact administrator!',
                    400
                );
            }
        }
    }
}
