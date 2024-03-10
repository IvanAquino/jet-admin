# Jetstream livewire admin

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ivanaquino/jet-admin.svg?style=flat-square)](https://packagist.org/packages/ivanaquino/jet-admin)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ivanaquino/jet-admin/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ivanaquino/jet-admin/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ivanaquino/jet-admin/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ivanaquino/jet-admin/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ivanaquino/jet-admin.svg?style=flat-square)](https://packagist.org/packages/ivanaquino/jet-admin)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/jet-admin.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/jet-admin)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require ivanaquino/jet-admin
```

Some frontend features works by using flowbite so you have to install it:

```bash
npm i -D flowbite
```

Add the view paths and require Flowbite as a plugin inside `tailwind.config.js` also add darkMode:

```js
{
    darkMode: 'class',
    //...
    plugins: [
        require('flowbite/plugin')
    ],
}
```

Import the Flowbite JavaScript package inside the `./resources/js/app.js` file to enable the interactive components such as modals, dropdowns, navbars, and more.

```js
import 'flowbite';
```

Publish jet-admin javascript

```bash
php artisan vendor:publish --tag="jet-admin-js"
```

Now add jet-admin js to `./resources/js/app.js`

```js
import './vendor/jet_admin';
```

To change navigation items you have to publish config file:

```bash
php artisan vendor:publish --tag="jet-admin-config"
```

This is the contents of the published config file:

```php
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
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="jet-admin-views"
```

## Usage

Landing layout

```blade
<x-jet-admin::landing-layout>
    Your own content goes here...
</x-jet-admin::landing-layout>
```

Dashboard ayout

```blade
<x-jet-admin::dashboard-layout>
    Your dashboard content goes here...
</x-jet-admin::dashboard-layout>
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ivan Aquino](https://github.com/IvanAquino)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
