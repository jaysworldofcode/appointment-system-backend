<?php
namespace App\Modules\Entity;

use App\Models\Patient as Model;

class Patient
{
    public $id;
    public $firstname;
    public $lastname;
    public $phone_number;
    public $address;
    public $email;
    public $status_id;
    public $user_id;

    public function getJSON(){
        return array(
            "id"                => $this->id,
            "firstname"         => $this->firstname,
            "lastname"          => $this->lastname,
            "phone_number"      => $this->phone_number,
            "address"           => $this->address,
            "email"             => $this->email,
            "status_id"         => $this->status_id,
            "user_id"           => $this->user_id,
        );
    }

    public static function modelToEntity(Model $model) : Patient{
        $entity               = new Patient();
        $entity->id           = $model->id;
        $entity->firstname    = $model->firstname;
        $entity->lastname     = $model->lastname;
        $entity->phone_number = $model->phone_number;
        $entity->address      = $model->address;
        $entity->email        = $model->email;
        $entity->status_id    = $model->status_id;
        $entity->user_id      = $model->user_id;

        return $entity;
    }
}
