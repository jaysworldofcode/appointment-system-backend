<?php
namespace App\Modules\Entity;

use App\Models\PatientsStatus as Model;

class PatientsStatus extends Model
{
    public $id;
    public $name;
    public $user_id;

    public function getJSON(){
        return array(
            "id"        => $this->id,
            "name"      => $this->name,
            "user_id"   => $this->user_id,
        );
    }

    public static function modelToEntity(Model $model) : PatientsStatus{
        $entity             = new PatientsStatus();
        $entity->id         = $model->id;
        $entity->name       = $model->name;
        $entity->user_id    = $model->user_id;

        return $entity;
    }
}
