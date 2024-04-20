<?php


namespace App\Modules\Repository;

use App\Exceptions\NoDataException;
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
        $user = $this->currentUser();

        $results = PatientModel::where('id', '=', $id)
            ->where('owner_id', '=', $user['id'])
            ->get();

        if(count($results) != 0){
            return Patient::modelToEntity($results[0]);
        }

        throw new NoDataException('Patients not found');
    }

    public function delete(int $id) : bool
    {
        return true;
    }

    public function store(Request $request) : Patient
    {
        $user = $this->currentUser();
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

    public function currentUser(){
        return JWTAuth::user();
    }
}
