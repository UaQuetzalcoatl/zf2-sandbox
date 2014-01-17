<?php
return array(
    'doctrine' => array(
        'driver' => array(
            // overriding zfc-user-doctrine-orm's config
            'zfcuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../../module/Skeleton/src/Skeleton/Entity'),
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Skeleton\Entity' => 'zfcuser_entity',
                ),
            ),
        ),
    ),

    'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'Skeleton\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
    ),

    'bjyauthorize' => array(
        'default_role' => 'guest',
        // Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'Skeleton\Entity\Role',
             ),
        ),
        'guards' => array(
            'BjyAuthorize\Guard\Route' => array(
                // admin
                array('route' => 'zfcadmin', 'roles' => array('admin')),
                array('route' => 'zfcadmin/users', 'roles' => array('admin')),
                array('route' => 'zfcadmin/edit-user', 'roles' => array('admin')),
                array('route' => 'zfcadmin/delete-user', 'roles' => array('admin')),
                // user
                array('route' => 'zfcuser', 'roles' => array('user')),
                array('route' => 'zfcuser/logout', 'roles' => array('user')),
                array('route' => 'zfcuser/changeemail', 'roles' => array('user')),
                array('route' => 'zfcuser/changepassword', 'roles' => array('user')),
                // guest
                array('route' => 'zfcuser/login', 'roles' => array('guest')),
                array('route' => 'zfcuser/register', 'roles' => array('guest')),
                // Below is the default index action used by the ZendSkeletonApplication
                array('route' => 'home', 'roles' => array('guest', 'user')),
                //static pages
                array('route' => 'about', 'roles' => array('guest', 'user')),
                array('route' => 'services', 'roles' => array('guest', 'user')),
                array('route' => 'contacts', 'roles' => array('guest', 'user')),
            ),
        ),
        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                    array(array('admin'), 'zfcadmin')
                ),

                // Don't mix allow/deny rules if you are using role inheritance.
                // There are some weird bugs.
                'deny' => array(
                    // ...
                ),
            ),
        ),
        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                'zfcadmin' => array(),
            ),
        ),
    ),

);
