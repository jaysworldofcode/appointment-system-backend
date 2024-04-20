<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\Patient;
use Illuminate\Http\Request;

interface IPatientsInteractor
{
    public function __construct(IPatientsRepository $patients_repository);

    public function getPatient(int $id) : Patient;
    public function savePatient(Request $request) : Patient;
}
