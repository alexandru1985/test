<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnitTest\User;

final class UserTest extends TestCase
{
    public function testReturnsFullName(): void
    {
        $user = new User;
        $user->first_name = 'John';
        $user->last_name = 'Doe';
        
        $this->assertEquals('John Doe', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() 
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function userHasFirstName() 
    {
        $user = new User;
        $user->first_name = 'John';

        $this->assertEquals('John',  $user->first_name);
    }
}