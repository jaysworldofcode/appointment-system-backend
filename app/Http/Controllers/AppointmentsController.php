<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Repository\AppointmentsRepository;
use App\Modules\Interactors\AppointmentsInteractor;
use App\Http\Requests\NewAppointmentRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AppointmentsController extends Controller
{
    private $appointments_interactor;

    public function __construct(AppointmentsRepository $appointments_repository)
    {
        $this->appointments_interactor = new AppointmentsInteractor(
            $appointments_repository
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

    public function currentUser(){ return JWTAuth::user(); }
}
