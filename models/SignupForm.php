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
            // $user = new User();
            // $user->first_name = $this->first_name;
            // $user->last_name = $this->last_name;
            // $user->email = $this->email;
            // $user->password = $this->password;
            // //$user->auth_key = \Yii::$app->security->generateRandomString();
            // if ($user->save()) {
            //     return $user;
            // }
        }
        return null;
    }
}
