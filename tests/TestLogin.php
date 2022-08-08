<?php

require (__DIR__.'/../models/User.php');

final class TestLogin extends \PHPUnit\Framework\TestCase
{
    public function testCorrectLogin(){
        $data['airline'] = 'f9';
        $data['username'] = 'f9user';
        $data['password'] = '123456';

        $user = New User;

        $result = $user->validate_login(json_encode($data));

        $this->assertIsObject($result);
    }

    public function testBadCredentials(){
        $data['airline'] = 'f9';
        $data['username'] = 'f9user';
        $data['password'] = '55684';

        $user = New User;

        $result = $user->validate_login(json_encode($data));

        $this->assertIsString($result);

        $this->assertEquals("Error no autorizado.", $result);
    }
}