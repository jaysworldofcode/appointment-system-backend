<?php
namespace App\Modules\Entity;

use App\Models\AppointmentsStatus as Model;

class AppointmentsStatus extends Model
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

    public static function modelToEntity(Model $model) : AppointmentsStatus{
        $entity             = new AppointmentsStatus();
        $entity->id         = $model->id;
        $entity->name       = $model->name;
        $entity->user_id    = $model->user_id;

        return $entity;
    }
}
