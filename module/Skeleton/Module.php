<?php

namespace Skeleton;

use Zend\Mvc\MvcEvent;

/**
 * Description of Module
 *
 * @author alex
 */
class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap(MvcEvent $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();
        $zfcServiceEvents = $serviceManager->get('zfcuser_user_service')->getEventManager();

        $zfcServiceEvents->attach('register', function ($e) use ($serviceManager) {
            /* @var $user \Skeleton\Entity\User */
            $user = $e->getParam('user');
            $userRoles = $user->getRoles();

            if (!empty($userRoles)) {
                return;
            }

            /* @var $entityManager \Doctrine\ORM\EntityManager */
            $entityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
            $defaultRole   = $entityManager
                ->getRepository('Skeleton\Entity\Role')
                ->findOneBy(array('roleId' => \Skeleton\Entity\Role::DEFAULT_ROLE_ID));

            if (!$defaultRole) {
                throw new \Exception('The default role is missing in persistance storage');
            }

            $user->addRole($defaultRole);
        });
    }
}
