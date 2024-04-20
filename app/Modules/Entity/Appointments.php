<?php
namespace App\Modules\Entity;

use App\Models\Appointments as Model;

class Appointments extends Model
{
    public $id;
    public $token;
    public $patients_id;
    public $schedule_datetime;
    public $status_id;
    public $notes;
    public $created_at;
    public $updated_at;

    public function getJSON(){
        return array(
            "id"                    => $this->id,
            "token"                 => $this->token,
            "patients_id"           => $this->patients_id,
            "schedule_datetime"     => $this->schedule_datetime,
            "status_id"             => $this->status_id,
            "notes"                 => $this->notes,
            "created_at"            => $this->created_at,
            "updated_at"            => $this->updated_at,
        );
    }

    public static function modelToEntity(Model $model) : Appointments{
        $entity                         = new Appointments();
        $entity->id                     = $model->id;
        $entity->token                  = $model->token;
        $entity->patients_id            = $model->patients_id;
        $entity->schedule_datetime      = $model->schedule_datetime;
        $entity->status_id              = $model->status_id;
        $entity->notes                  = $model->notes;
        $entity->created_at             = $model->created_at;
        $entity->updated_at             = $model->updated_at;

        return $entity;
    }
}
