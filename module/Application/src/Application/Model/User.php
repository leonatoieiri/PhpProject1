<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

class User
{
    public $name;
     public $email;
     public $birth;
     public $gender;

     public function exchangeArray($data)
     {
         $this->name  = (!empty($data['user_name'])) ? $data['user_name'] : null;
         $this->email = (!empty($data['user_email'])) ? $data['user_email'] : null;
         $this->birth  = (!empty($data['user_birthday'])) ? $data['user_birthday'] : null;
         $this->gender  = (!empty($data['user_gender'])) ? $data['user_gender'] : null;
     }
}