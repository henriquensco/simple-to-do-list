<?php

namespace app\services;

use app\models\User;

class UserService
{
    public function __construct() {}

    public function login() {}

    public function create($data)
    {
        $user = new User();

        if ($user->findByEmail($data->email)) {
            return $user->getErrors();
        }

        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->password = $data->password;

        if ($user->save()) {
            return $user;
        } else {
            return $user->getErrors();
        }
    }
}
