<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\Patient;
use Illuminate\Http\Request;

interface IPatientsInteractor
{
    public function __construct(IPatientsRepository $patients_repository);

    public function getPatient(int $id, int $user_id) : Patient;
    public function savePatient(Request $request, int $user_id) : Patient;
    public function deletePatient($id, int $user_id);
    public function setStatus(int $id, int $status_id, int $user_id) : Patient;
    public function updatePatient(array $data, int $user_id) : Patient;
}
