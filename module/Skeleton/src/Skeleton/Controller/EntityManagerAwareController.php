<?php

namespace Skeleton\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Skeleton\EntityManager\EntityManagerAwareInterface;

/**
 * Description of EntityManagerAwareController
 *
 * @author alex
 */
class EntityManagerAwareController extends AbstractActionController implements EntityManagerAwareInterface
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
