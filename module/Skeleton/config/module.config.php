<?php
return array(
    'service_manager' => array(
        'aliases' => array(
            'zfcuser_doctrine_em' => 'Doctrine\ORM\EntityManager',
        ),
        'factories' => array(
            'PhlySimplePage\PageCache' => 'PhlySimplePage\PageCacheService',
        ),
    ),
    'controllers' => array(
        'initializers' => array(
            'Skeleton\Initializer\EntityManagerInitializer'
        ),
    ),
    'phly-simple-page' => array(
        'cache' => array(
            'adapter' => array(
                'name'   => 'filesystem',
                'options' => array(
                    'namespace'       => 'pages',
                    'cache_dir'       => getcwd() . '/data/cache',
                    'dir_permission'  => '0777',
                    'file_permission' => '0666',
                ),
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'about' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/about',
                    'defaults' => array(
                        'controller' => 'PhlySimplePage\Controller\Page',
                        'template'   => 'about',
                    ),
                ),
            ),
            'contacts' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/contacts',
                    'defaults' => array(
                        'controller' => 'PhlySimplePage\Controller\Page',
                        'template'   => 'contacts',
                    ),
                ),
            ),
            'services' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/services',
                    'defaults' => array(
                        'controller' => 'PhlySimplePage\Controller\Page',
                        'template'   => 'services',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../pages',
        ),
    )
);
