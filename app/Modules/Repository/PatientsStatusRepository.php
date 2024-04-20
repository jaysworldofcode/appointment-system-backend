<?php


namespace App\Modules\Repository;

use App\Exceptions\NoDataException;
use App\Modules\Entity\PatientsStatus;
use App\Modules\Interfaces\IPatientsStatusRepository;
use App\Models\PatientsStatus as PatientsStatusModel;
use Illuminate\Http\Request;

class PatientsStatusRepository implements IPatientsStatusRepository
{
    public function show(int $id, int $user_id) : PatientsStatus
    {
        $results = PatientsStatusModel::where('id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->get();

        error_log($results);

        if(count($results) != 0){
            return PatientsStatus::modelToEntity($results[0]);
        }

        throw new NoDataException('Unknown patient status');
    }
}
