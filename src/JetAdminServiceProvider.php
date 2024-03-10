<?php

namespace IvanAquino\JetAdmin;

use Illuminate\Support\Facades\Blade;
use IvanAquino\JetAdmin\Commands\JetAdminCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class JetAdminServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('jet-admin')
            ->hasConfigFile()
            ->hasViews()
            ->hasViewComponents('jet-admin')
            ->hasAssets()
            // ->hasMigration('create_jet-admin_table')
            ->hasCommand(JetAdminCommand::class);

        $this->publishes([
            __DIR__.'/../resources/js/jet_admin.js' => base_path('resources/js/vendor/jet_admin.js'),
        ], 'jet-admin-js');

        Blade::componentNamespace('IvanAquino\\JetAdmin\\View\\Components', 'jet-admin');
    }
}
