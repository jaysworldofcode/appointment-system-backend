<?php


namespace App\Modules\Repository;

use App\Modules\Entity\Patient;
use App\Modules\Interfaces\IPatientsRepository;
use App\Models\Patient as PatientModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PatientsRepository implements IPatientsRepository
{
    public function index($request) : array
    {
        return array();
    }

    public function show(int $id) : Patient
    {
        $test = new Patient();

        $test->id = 1;
        $test->firstname = 'Test';
        $test->lastname = 'Test';
        $test->email = 'tester@gmail.com';
        $test->phone_number = '1234';
        $test->status_id = 1;
        $test->user_id = 1;

        return $test;
    }

    public function delete(int $id) : bool
    {
        return true;
    }

    public function store(Request $request) : Patient
    {
        $user = JWTAuth::user();
        $patient = PatientModel::create(
            array_merge(
                $request->all(),
                array('owner_id' => $user['id'])
            )
        );

        return Patient::modelToEntity(
            $patient
        );
    }
}
