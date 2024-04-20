<?php
namespace App\Modules\Entity;

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
}
