# Filament Password Confirmation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/juliomotol/filament-password-confirmation.svg?style=flat-square)](https://packagist.org/packages/juliomotol/filament-password-confirmation)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/juliomotol/filament-password-confirmation/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/juliomotol/filament-password-confirmation/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/juliomotol/filament-password-confirmation/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/juliomotol/filament-password-confirmation/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/juliomotol/filament-password-confirmation.svg?style=flat-square)](https://packagist.org/packages/juliomotol/filament-password-confirmation)


Simplifies adding a secure password confirmation step to your admin panels.

- Prompts users to re-enter their password before performing sensitive actions.
- Increases security by preventing accidental or unauthorized actions due to long session times.
- Easy to integrate and highly configurable.

## Installation

You can install the package via composer:

```bash
composer require juliomotol/filament-password-confirmation
```

Then add the plugin to your panel.

```php
JulioMotol\FilamentPasswordConfirmation\FilamentPasswordConfirmationPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
       ->plugin(FilamentPasswordConfirmationPlugin::make());
}
```

You can configure the route name, uri, middleware and password timeout duration.

```php
FilamentPasswordConfirmationPlugin::make()
    ->routeName('confirm')
    ->routeUri('auth/confirm')
    ->routeMiddleware(FooMiddleware::class) // Accepts string|array
    ->passwordTimeout(10800) // Accepts int|null that represents the amount of seconds
```

Optionally, you can publish the translations and views using.

```bash
php artisan vendor:publish --tag="filament-password-confirmation-translations"
php artisan vendor:publish --tag="filament-password-confirmation-views"
```

## Usage

Simply use `RequiresPasswordConfirmation` in your pages/resources.

```php
use JulioMotol\FilamentPasswordConfirmation\RequiresPasswordConfirmation;

class AdminResource extends Resource
{
    use RequiresPasswordConfirmation;
    ...
}
```

You can configure the password confirmation timeout within your page/resource.

```php
use JulioMotol\FilamentPasswordConfirmation\RequiresPasswordConfirmation;

class AdminResource extends Resource
{
    use RequiresPasswordConfirmation;

    protected static ?int $passwordTimeout = 360; // the amount of seconds
    ...
}
```

> NOTE: The password timeout duration is determined in the following order until it encounters a non-null value.
> 1. `$passwordTimeout` property in the page/resource
> 2. `passwordTimeout()` configured in the plugin during registry
> 3. `auth.password_timeout` config assigned in `config/auth.php`

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Julio Motol](https://github.com/juliomotol)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
