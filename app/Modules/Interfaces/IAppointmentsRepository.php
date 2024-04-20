<?php
namespace App\Modules\Interfaces;

use App\Modules\Entity\Appointments;
use Illuminate\Http\Request;

interface IAppointmentsRepository
{
    public function show(int $id, int $user_id) : Appointments;
    public function store(array $data, int $user_id) : Appointments;
    public function update(array $data, int $user_id) : Appointments;
    public function filter(array $filter, int $user_id) : array;
}
