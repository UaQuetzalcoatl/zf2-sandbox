<?php
return array(
    'navigation' => array(
        'admin' => array(
            'user_profile' => array(
                'label' => 'My Profile',
                'route' => 'zfcuser'
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);
