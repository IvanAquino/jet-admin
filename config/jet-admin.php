<?php

// config for IvanAquino/JetAdmin
return [
    /*
     |--------------------------------------------------------------------------
     | Landing Navigation
     |--------------------------------------------------------------------------
     |
     | name: Could be a string or a translation key this will be passed through the __() function
     | route: Could be a url or a route name
     |
     |*/
    'landing_navigation' => [
        [
            'name' => 'Home',
            'route' => '/',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Dashboard Navigation
     |--------------------------------------------------------------------------
     |
     |
     |*/
    'dashboard_navigation' => [
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'active_route' => 'dashboard*',
            'icon' => 'home',
        ],
        [
            'name' => 'Profile',
            'route' => 'profile.show',
            'active_route' => 'profile.show',
            'icon' => 'user',
        ],
        // [
        //     'name' => 'Url example',
        //     'route' => 'my-url',
        //     'active_route' => 'my-url',
        //     'icon' => 'shield-exclamation',
        // ],
    ],
];
