<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setfirstName('first name')
            ->setName('name')
            ->setPassword('password')
            ->setPhoneNumber('phone number')
            ->setAbout('about')
            ->setInstagram('instagram');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getFirstName() === 'first name');
        $this->assertTrue($user->getName() === 'name');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getPhoneNumber() === 'phone number');
        $this->assertTrue($user->getAbout() === 'about');
        $this->assertTrue($user->getInstagram() === 'instagram');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setfirstName('first name')
            ->setName('name')
            ->setPassword('password')
            ->setPhoneNumber('phone number')
            ->setAbout('about')
            ->setInstagram('instragram');

            $this->assertFalse($user->getEmail() === 'false@test.com');
            $this->assertFalse($user->getFirstName() === 'false');
            $this->assertFalse($user->getName() === 'false');
            $this->assertFalse($user->getPassword() === 'false');
            $this->assertFalse($user->getPhoneNumber() === 'false');
            $this->assertFalse($user->getAbout() === 'false');
            $this->assertFalse($user->getInstagram() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getName());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getAbout());
        $this->assertEmpty($user->getInstagram());
    }
}