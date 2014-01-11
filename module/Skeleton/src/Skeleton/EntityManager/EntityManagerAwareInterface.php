<?php

namespace Skeleton\EntityManager;

use Doctrine\ORM\EntityManager;

/**
 *
 * @author alex
 */
interface EntityManagerAwareInterface
{
    /**
     * Inject Doctrine EntityManager
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager);
}
