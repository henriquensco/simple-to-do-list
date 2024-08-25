<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        $user = User::findIdentity(1);

        verify($user)->notEmpty();
        //verify($user->email)->equals('henrique@email.com');

        //verify(User::findIdentity(1))->empty();
    }

    public function testFindUserByAccessToken()
    {
        $user = User::findIdentityByAccessToken('100-token');

        verify($user)->notEmpty();
        verify($user->email)->equals('henrique@email.com');

        verify(User::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByEmail()
    {
        $user = User::findByEmail('henrique@email.com');

        verify($user)->notEmpty();
        verify(User::findByEmail('1henrique@email.com'))->empty();
    }

    /**
     * @depends testFindUserByEmail
     */
    public function testValidateUser()
    {
        $user = User::findByEmail('henrique@email.com');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('henrique@email.com'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();
    }
}
