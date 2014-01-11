<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Skeleton\Controller\EntityManagerAwareController;

/**
 * Description of UserController
 *
 * @author alex
 */
class UserController extends EntityManagerAwareController
{
    public function listAction()
    {
        return new ViewModel;
    }

    public function editAction()
    {}

    public function deleteAction()
    {}
}
