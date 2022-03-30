<?php

namespace Abdulrahman\GenericChat;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Abdulrahman\GenericChat\Commands\GenericChatCommand;

class GenericChatServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('generic-chat')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_generic-chat_table')
            ->hasCommand(GenericChatCommand::class);
    }
}
