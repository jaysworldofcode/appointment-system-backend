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

        AppointmentsModel::whereId($data['id'])
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

    public function filter($filter, $user_id) : array{
        $results = AppointmentsModel::where(function ($query) use ($user_id) {
            if(request()->has('from') && request()->has('to') && request()->query('from') && request()->query('to')){
                $query->whereBetween('schedule_datetime', [
                    request()->query('from'),
                    request()->query('to')
                ]);
            }

            if(request()->has('date_created_from') && request()->has('date_created_to') && request()->query('date_created_from') && request()->query('date_created_to')){
                $query->whereBetween('created_at', [
                    request()->query('date_created_from'),
                    request()->query('date_created_to')
                ]);
            }

            if(request()->has('status_id') && request()->query('status_id')){
                $query->where('status_id', '=', request()->query('status_id'));
            }

            if(request()->has('patients_id') && request()->query('patients_id')){
                $query->where('patients_id', '=', request()->query('patients_id'));
            }

            if(request()->has('notes') && request()->query('notes')){
                $query->where('notes', 'like', '%' . request()->query('notes') . '%');
            }

            $query->where('user_id', '=', $user_id);
        })

        ->with(['patient', 'status'])
        ->orderBy('schedule_datetime')
        ->paginate(
            40,
            ['*'],
            'page',
            request()->has('page')?  request()->query('page'):1
        )
        ->toArray();

        return Appointments::hydrate($results)->toArray();
    }

    public function delete(int $id, int $user_id){
        # validate if patient exists
        $this->show($id, $user_id);
        AppointmentsModel::where('id', $id)->delete();

        return true;
    }
}
