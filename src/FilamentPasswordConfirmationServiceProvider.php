<?php

namespace JulioMotol\FilamentPasswordConfirmation;

use JulioMotol\FilamentPasswordConfirmation\Pages\ConfirmPassword;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPasswordConfirmationServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-password-confirmation';

    public static string $viewNamespace = 'filament-password-confirmation';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->askToStarRepoOnGitHub('juliomotol/filament-password-confirmation');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        Livewire::component('julio-motol.filament-password-confirmation.pages.confirm-password', ConfirmPassword::class);
    }
}
