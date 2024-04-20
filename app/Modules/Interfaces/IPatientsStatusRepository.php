<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\PatientsStatus;
use Illuminate\Http\Request;

interface IPatientsStatusRepository
{
    public function show(int $id, int $user_id) : PatientsStatus;
}
