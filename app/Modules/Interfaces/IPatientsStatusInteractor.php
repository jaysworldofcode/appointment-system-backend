<?php
namespace App\Modules\Interfaces;

use App\Modules\Entity\PatientsStatus;
use Illuminate\Http\Request;

interface IPatientsStatusInteractor
{
    public function __construct(IPatientsStatusRepository $patients_status_repository);

    public function getStatus(int $id, int $user_id) : PatientsStatus;
}
