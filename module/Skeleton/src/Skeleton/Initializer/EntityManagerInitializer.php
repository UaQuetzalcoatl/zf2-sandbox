<?php

namespace Skeleton\Initializer;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Skeleton\EntityManager\EntityManagerAwareInterface;

/**
 * Description of EntityManagerInitializer
 *
 * @author alex
 */
class EntityManagerInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof EntityManagerAwareInterface) {
            $instance->setEntityManager($serviceLocator->get('doctrine.entitymanager.orm_default'));
        }
    }
}
