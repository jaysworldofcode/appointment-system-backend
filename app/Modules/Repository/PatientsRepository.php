<?php


namespace App\Modules\Repository;

use App\Exceptions\NoDataException;
use App\Modules\Entity\Patient;
use App\Modules\Interfaces\IPatientsRepository;
use App\Models\Patient as PatientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsRepository implements IPatientsRepository
{
    public function index($request) : array
    {
        return array();
    }

    public function show(int $id, int $user_id) : Patient
    {
        $results = PatientModel::where('id', '=', $id)
            ->where('owner_id', '=', $user_id)
            ->get();

        if(count($results) != 0){
            return Patient::modelToEntity($results[0]);
        }

        throw new NoDataException('Patient not found');
    }

    public function delete(int $id, int $user_id) : bool
    {
        # validate if patient exists
        $this->show($id, $user_id);
        PatientModel::where('id', $id)->delete();

        return true;
    }

    public function store(Request $request, int $user_id) : Patient
    {
        $patient = PatientModel::create(
            array_merge(
                $request->all(),
                array('owner_id' => $user_id)
            )
        );

        return Patient::modelToEntity(
            $patient
        );
    }

    public function setStatus(int $id, int $status_id, int $user_id) : Patient{
        # validate if patient exists
        $find = $this->show($id, $user_id);

        $new_data = array('status_id' => $status_id);

        $patient = PatientModel::whereId($id)
            ->update($new_data);
            
        if($patient){
            $find->status_id = $status_id;
        }

        return $find;
    }

    public function update(array $data, int $user_id) : Patient{
        # validate if patients exists
        $this->show($data['id'], $user_id);

        $patient = PatientModel::whereId($data['id'])
            ->update($data);

        $find = $this->show($data['id'], $user_id);

        return $find;
    }
}
