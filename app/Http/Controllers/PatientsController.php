<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Modules\Interactors\PatientsInteractor;
use App\Modules\Repository\PatientsRepository;
use App\Modules\Repository\PatientsStatusRepository;
use App\Http\Requests\NewPatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Modules\Interactors\PatientsStatusInteractor;
use Tymon\JWTAuth\Facades\JWTAuth;

class PatientsController extends Controller
{
    private $patients_interactor,
            $patients_status_repository;

    public function __construct(PatientsRepository $patients_repository, PatientsStatusRepository $patients_status_repository)
    {
        $this->patients_interactor = new PatientsInteractor(
            $patients_repository
        );

        $this->patients_status_repository = new PatientsStatusInteractor(
            $patients_status_repository
        );
    }

    public function show($id){
        $patient = $this->patients_interactor->getPatient(
            $id,
            $this->currentUser()['id']
        );

        return response(
            $patient->getJSON(),
            200
        );
    }

    public function store(NewPatientRequest $request){
        $patient = $this->patients_interactor->savePatient(
            $request,
            $this->currentUser()['id']
        );

        return response(
            $patient->getJSON(),
            200
        );
    }

    public function delete($id){
        $this->patients_interactor->deletePatient(
            $id,
            $this->currentUser()['id']
        );

        return response(
            [
                'message' => 'Successfuly deleted'
            ],
            200
        );
    }

    public function setStatus($id, $status_id){
        $this->patients_status_repository->getStatus(
            $status_id,
            $this->currentUser()['id']
        );

        $this->patients_interactor->setStatus(
            $id,
            $status_id,
            $this->currentUser()['id']
        );

        return response( [ 'message' => 'Successfuly updated' ], 200);
    }

    public function update(UpdatePatientRequest $request){
        $patient = $this->patients_interactor->updatePatient(
            $request->all(),
            $this->currentUser()['id']
        );
        
        return response([
            'message'   => 'Successfuly updated',
            'data'      => $patient->getJSON()
        ], 200);
    }

    public function currentUser(){ return JWTAuth::user(); }
}
