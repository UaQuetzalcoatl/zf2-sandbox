<?php
return array(
    'service_manager' => array(
        'aliases' => array(
            'zfcuser_doctrine_em' => 'Doctrine\ORM\EntityManager',
        ),
    ),
    'controllers' => array(
        'initializers' => array(
            'Skeleton\Initializer\EntityManagerInitializer'
        ),
    ),
);
