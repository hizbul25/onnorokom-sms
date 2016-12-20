# OnnoRokom SMS for Laravel 5.*


## Installation

The OnnoRokom SMS Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`hizbul/onnorokom-sms` package and setting the `minimum-stability` to `dev` (required for Laravel 5.*) in your
project's `composer.json`.

```json
{
    "require": {
        "hizbul/onnorokom-sms": "dev",
    },
}
```

or

Require this package with composer:
```
composer require hizbul/onnorokom-sms
```

Update your packages with ```composer update``` or install with ```composer install```.


## Usage

To use the OnnoRokom SMS Service Provider, you must register the provider when bootstrapping your Laravel application. There are
essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the OnnoRokom SMS Service Provider.

```php
    'providers' => [
        // ...
        Hizbul\OnnorokomSms\OnnorokomSmsServiceProvider::class,
    ]
```


Find the `aliases` key in `config/app.php`.

```php
    'aliases' => [
        // ...
        'OnnoRokomSMS' => Hizbul\OnnorokomSms\Facades\OnnoRokomSMS::class,
    ]
```


## Configuration

To use your own settings, publish config.

```$ php artisan vendor:publish```

`config/captcha.php`


## Sending a text message One to One:

```php

    onnorokom_sms(['message' => 'some text msg', 'mobile_number' => '01918....']);
```

## Sending text message One to Many (Bulk):

```php

    onnorokom_sms(['message' => 'some text msg', 'mobile_number' => ['01918....', '0171....']]);
```

Based on [OnnoRokom SMS Service](https://www.onnorokomsms.com/bulk-sms-feature/sms-gateway-api-for-developer.php)

^_^
