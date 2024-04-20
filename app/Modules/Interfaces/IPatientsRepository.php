<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\Patient;
use Illuminate\Http\Request;

interface IPatientsRepository
{
    public function index($request) : array;
    public function show(int $id, int $user_id) : Patient;
    public function delete(int $id, int $user_id) : bool;
    public function store(Request $request, int $user_id) : Patient;
    public function setStatus(int $id, int $status_id, int $user_id) : Patient;
    public function update(array $data, int $user_id) : Patient;
}
