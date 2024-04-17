# Prompt your users to re-enter their password before performing sensitive actions.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/juliomotol/filament-password-confirmation.svg?style=flat-square)](https://packagist.org/packages/juliomotol/filament-password-confirmation)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/juliomotol/filament-password-confirmation/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/juliomotol/filament-password-confirmation/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/juliomotol/filament-password-confirmation/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/juliomotol/filament-password-confirmation/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/juliomotol/filament-password-confirmation.svg?style=flat-square)](https://packagist.org/packages/juliomotol/filament-password-confirmation)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require juliomotol/filament-password-confirmation
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-password-confirmation-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-password-confirmation-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-password-confirmation-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentPasswordConfirmation = new JulioMotol\FilamentPasswordConfirmation();
echo $filamentPasswordConfirmation->echoPhrase('Hello, JulioMotol!');
```

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
