<?php


namespace App\Modules\Repository;

use App\Modules\Entity\Patient;
use App\Modules\Interfaces\IPatientsRepository;

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

    public function store(Patient $patient) : Patient
    {
        $product = Clinics::create($request->all());

        return response($product, 200);
    }
}
