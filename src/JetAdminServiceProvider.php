<?php

namespace IvanAquino\JetAdmin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IvanAquino\JetAdmin\Commands\JetAdminCommand;

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
            ->hasMigration('create_jet-admin_table')
            ->hasCommand(JetAdminCommand::class);
    }
}
