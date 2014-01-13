<?php

namespace ModulesTests\Entity;

use PHPUnit_Framework_TestCase;
use Skeleton\Entity\Role;
use Skeleton\Entity\User;

/**
 * Description of UserTest
 *
 * @author alex
 */
class UserTest extends PHPUnit_Framework_TestCase
{
    public function testCanRun()
    {
        $this->assertTrue(true);
    }

    public function testCanAddMultipleRoles()
    {
        $adminRole = new Role();
        $adminRole->setRoleId('admin');

        $userRole = new Role();
        $userRole->setRoleId('user');

        $user = new User();

        $user->addRole($adminRole);
        $user->addRole($userRole);

        $this->assertEquals(array($adminRole, $userRole), $user->getRoles());
    }
}
