<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\Patient;

interface IPatientsRepository
{
    public function index($request) : array;
    public function show(int $id) : Patient;
    public function delete(int $id) : bool;
    public function store(Patient $patient) : Patient;
}
