<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Repository\AppointmentsRepository;
use App\Modules\Repository\AppointmentsStatusRepository;
use App\Modules\Interactors\AppointmentsInteractor;
use App\Http\Requests\NewAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AppointmentsController extends Controller
{
    private $appointments_interactor;

    public function __construct(
        AppointmentsRepository $appointments_repository,
        AppointmentsStatusRepository $appointment_status_repository)
    {
        $this->appointments_interactor = new AppointmentsInteractor(
            $appointments_repository,
            $appointment_status_repository
        );
    }

    public function store(NewAppointmentRequest $request){
        $patient = $this->appointments_interactor->saveAppointment(
            $request->all(),
            $this->currentUser()['id']
        );

        return response(
            $patient->getJSON(),
            200
        );
    }

    public function show($id){
        $appointment = $this->appointments_interactor->getAppointment(
            $id,
            $this->currentUser()['id']
        );

        return response(
            $appointment->getJSON(),
            200
        );
    }

    public function filter(Request $request){
        $appointment = $this->appointments_interactor->filterAppointments(
            $request->all(),
            $this->currentUser()['id']
        );

        return response(
            $appointment,
            200
        );
    }

    public function delete($id){
        $this->appointments_interactor->deleteAppointments(
            $id,
            $this->currentUser()['id']
        );

        return response(['message' => 'Successfuly deleted'], 200);
    }

    public function update(UpdateAppointmentRequest $request){
        $appointment = $this->appointments_interactor->updateAppointment(
            $request->all(),
            $this->currentUser()['id']
        );

        return response(
            $appointment->getJSON(),
            200
        );
    }

    public function currentUser(){ return JWTAuth::user(); }
}
