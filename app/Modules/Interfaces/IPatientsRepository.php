<?php
namespace App\Modules\Interfaces;

use App\Modules\Driver\PostRepositoryInterface;
use App\Modules\Entity\Patient;
use Illuminate\Http\Request;

interface IPatientsRepository
{
    public function index($request) : array;
    public function show(int $id) : Patient;
    public function delete(int $id) : bool;
    public function store(Request $request) : Patient;
    public function currentUser();
}
