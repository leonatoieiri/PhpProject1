<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

    public function saveUser(User $user) {
        $data = [
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_birthday' => $user->birth,
            'user_gender' => $user->gender
        ];
        
        $this->tableGateway->insert($data);
    }

}
