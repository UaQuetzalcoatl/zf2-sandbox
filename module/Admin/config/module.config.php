<?php
return array(
    'navigation' => array(
        'admin' => array(
            'my_profile' => array(
                'label' => 'My Profile',
                'route' => 'zfcuser'
            ),
            'users' => array(
                'label' => 'User Management',
                'route' => 'zfcadmin/users'
            ),
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'template_map' => array(
            'zfc-admin/admin/index' => __DIR__ . '/../view/admin/index/index.phtml',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\User' => 'Admin\Controller\UserController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'users' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/users[/:page]',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\User',
                                'action'     => 'list',
                                'page'       => 1
                            ),
                            'constraints' => array(
                                'page' => '[0-9]+'
                            ),
                        )
                    ),
                    'edit-user' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/user/edit/:id',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\User',
                                'action'     => 'edit',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                        ),
                    ),
                    'delete-user' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/user/delete/:id',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\User',
                                'action'     => 'delete',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                        ),
                    ),
                )
            ),
        ),
    ),
);
