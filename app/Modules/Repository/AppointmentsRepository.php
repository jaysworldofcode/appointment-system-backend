<?php


namespace App\Modules\Repository;

use App\Exceptions\NoDataException;
use App\Modules\Entity\Appointments;
use App\Modules\Interfaces\IAppointmentsRepository;
use App\Models\Appointments as AppointmentsModel;
use Illuminate\Http\Request;

class AppointmentsRepository implements IAppointmentsRepository
{
    public function show(int $id, int $user_id) : Appointments
    {
        $results = AppointmentsModel::where('id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->with(['patient', 'status'])
            ->get();

        if(count($results) != 0){
            return Appointments::modelToEntity($results[0]);
        }

        throw new NoDataException('Appointment not found');
    }

    public function update(array $data, int $user_id) : Appointments{
        # validate if patients exists
        $this->show($data['id'], $user_id);

        $patient = Appointments::whereId($data['id'])
            ->update($data);

        $find = $this->show($data['id'], $user_id);

        return $find;
    }

    public function store(array $data, int $user_id) : Appointments
    {
        $appointment = AppointmentsModel::create(
            array_merge(
                $data,
                array('user_id' => $user_id)
            )
        );

        return Appointments::modelToEntity(
            $appointment
        );
    }
}
