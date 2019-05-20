# Laravel Silent Spam Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/breadthe/laravel-silent-spam-filter.svg?style=flat-square)](https://packagist.org/packages/breadthe/laravel-silent-spam-filter)
[![Build Status](https://img.shields.io/travis/breadthe/laravel-silent-spam-filter/master.svg?style=flat-square)](https://travis-ci.org/breadthe/laravel-silent-spam-filter)
[![Quality Score](https://img.shields.io/scrutinizer/g/breadthe/laravel-silent-spam-filter.svg?style=flat-square)](https://scrutinizer-ci.com/g/breadthe/laravel-silent-spam-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/breadthe/laravel-silent-spam-filter.svg?style=flat-square)](https://packagist.org/packages/breadthe/laravel-silent-spam-filter)

A simple way to filter a message for spam in a Laravel project, based on your own custom keyword and phrase blacklist. It is useful in silently ignoring messages submitted via contact forms, without alerting the spammer that the message went through.

By default it comes with virtually zero configuration, which means you'll have to add your own keywords and phrases to the blacklist.

## Installation

You can install the package via composer:

```bash
composer require breadthe/laravel-silent-spam-filter
```

Optionally publish the configuration file `config/silentspam.php`:

```bash
php artisan vendor:publish --provider="Breadthe\SilentSpam\SilentSpamServiceProvider" --tag="silentspam-config"
```

## Configuration

If you published the configuration file `config/silentspam.php` you can add additional entries to the `blacklist` key, or overwrite the sample entries.

At runtime you can use `SilentSpam::blacklist([])` to add additional keywords, that will get merged with the list in the configuration. This can be useful if you want to keep a global blacklist in the config, but also add custom lists depending on the context when checking for spam.

## Usage

``` php
$spamMessage = 'This message contains spam';
$normalMessage = 'This is a normal message';

SilentSpam::blacklist([
    'contains spam',
]);

SilentSpam::isSpam($spamMessage); // true
SilentSpam::notSpam($spamMessage); // false

SilentSpam::isSpam($spamMessage); // false
SilentSpam::notSpam($spamMessage); // true

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email omigoshdev@protonmail.com instead of using the issue tracker.

## Credits

- [Omigosh Dev](https://github.com/breadthe)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
