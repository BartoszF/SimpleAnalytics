
# BartoszF/SimpleAnalytics

[![Laravel](https://img.shields.io/badge/Laravel-~5.2-orange.svg?style=flat-square)](http://laravel.com)
[![Source](http://img.shields.io/badge/source-BartoszF/SimpleAnalytics-blue.svg?style=flat-square)](https://github.com/BartoszF/SimpleAnalytics)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

Laravel package for implementing simple analytics

# Table of Contents
* [Requirements](#requirements)
* [Getting Started](#getting-started)
* [Contribution Guidelines](#contribution-guidelines)


# <a name="requirements"></a>Requirements

* This package requires PHP 5.6+
* As for now, you need Auth facade with user.

# <a name="getting-started"></a>Getting Started

1. Require the package in your `composer.json` and update your dependency with `composer update`:

```
"require": {
...
"bartoszf/simple-analytics": "~0.8",
...
},
```

2. Add the package to your application service providers in `config/app.php`.

```php
'providers' => [

Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
Illuminate\Auth\AuthServiceProvider::class,
...
BartoszF\SimpleAnalytics\AnalyticsServiceProvider::class,

],
```

3. Publish the package migrations to your application and run these with `php artisan migrate`.

```
$ php artisan vendor:publish --provider="BartoszF\SimpleAnalytics\AnalyticsServiceProvider"
```

4. Add the middleware to your `app/Http/Kernel.php`.

```php
protected $routeMiddleware = [

....
'analytics' => BartoszF\SimpleAnalytics\Middleware\ReportUserRouteMiddleware::class,

];
```

5. Adjust view as you wish (probably extend it with your app layout)

6. Add `analytics` middleware to your routes from wich you want to get details.


# <a name="contribution-guidelines"></a>Contribution Guidelines

Support follows PSR-2 PHP coding standards, and semantic versioning.

Please report any issue you find in the issues page.
Pull requests are welcome.