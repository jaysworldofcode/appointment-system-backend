<?php


namespace App\Modules\Repository;

use App\Exceptions\NoDataException;
use App\Modules\Entity\AppointmentsStatus;
use App\Modules\Interfaces\IAppointmentsStatusRepository;
use App\Models\AppointmentsStatus as AppointmentsStatusModel;
use Illuminate\Http\Request;

class AppointmentsStatusRepository implements IAppointmentsStatusRepository
{
    public function show(int $id, int $user_id) : AppointmentsStatus
    {
        $results = AppointmentsStatusModel::where('id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->get();

        error_log($results);

        if(count($results) != 0){
            return AppointmentsStatus::modelToEntity($results[0]);
        }

        throw new NoDataException('Unknown appointment status');
    }
}
