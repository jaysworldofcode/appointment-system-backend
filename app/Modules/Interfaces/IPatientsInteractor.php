<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\Patient;

interface IPatientsInteractor
{
    public function __construct(IPatientsRepository $patients_repository);

    public function getPatient(int $id) : Patient;
    public function savePatient($patient) : Patient;
}
