<?php

namespace ModulesTests\Entity;

use PHPUnit_Framework_TestCase;
use Skeleton\Entity\Role;

/**
 * Description of RoleTest
 *
 * @author alex
 */
class RoleTest extends PHPUnit_Framework_TestCase
{
    public function testCanSetparentRole()
    {
        $adminRole = new Role();
        $adminRole->setRoleId('admin');

        $userRole = new Role();
        $userRole->setRoleId('user');
        $adminRole->setParent($userRole);

        $this->assertEquals($adminRole->getParent(), $userRole);
    }
}
