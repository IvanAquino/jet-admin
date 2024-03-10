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
     | Items in this array will be used to generate the dashboard sidebar
     | - name: The label that will be displayed in the sidebar
     | - route: Could be a route name or a URL
     | - active_route: The route name or URL that will be used to determine if the item is active
     | - icon: The icon that will be displayed in the sidebar, Heroicons' name.
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
