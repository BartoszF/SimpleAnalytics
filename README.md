
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

# <a name="getting-started"></a>Getting Started

1. Require the package in your `composer.json` and update your dependency with `composer update`:

```
"require": {
...
"BartoszF/SimpleAnalytics": "~1.0@dev",
...
},
```

2. Add the package to your application service providers in `config/app.php`.

```php
'providers' => [

'Illuminate\Foundation\Providers\ArtisanServiceProvider',
'Illuminate\Auth\AuthServiceProvider',
...
'BartoszF\SimpleAnalytics\AnalyticsServiceProvider',

],
```

3. Publish the package migrations to your application and run these with `php artisan migrate.

```
$ php artisan vendor:publish --provider="BartoszF\SimpleAnalytics\AnalyticsServiceProvider"
```

4. Add the middleware to your `app/Http/Kernel.php`.

```php
protected $routeMiddleware = [

....
'analyze' => BartoszF\SimpleAnalytics\Middleware\ReportUserRoute::class,

];
```

```

# <a name="contribution-guidelines"></a>Contribution Guidelines

Support follows PSR-2 PHP coding standards, and semantic versioning.

Please report any issue you find in the issues page.
Pull requests are welcome.