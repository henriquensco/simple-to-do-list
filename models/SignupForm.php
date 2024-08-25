<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use app\services\UserService;

class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'password_repeat'], 'required'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email has already been taken.'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $userService = new UserService();
            return $userService->create($this);
        }
        return null;
    }
}
