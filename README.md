## bestit/harvest-api

[![Build Status](https://travis-ci.org/bestit/harvest-api.svg?branch=master)](https://travis-ci.org/bestit/harvest-api)

TODO

## Installation

### Step 1: Composer

From the command line, run:

```
composer require bestit/harvest-api
```

### Step 2: Service Provider

For your Laravel app, open `config/app.php` and, within the `providers` array, append:

```
BestIt\Harvest\HarvestServiceProvider::class,
```

This will bootstrap the package into Laravel.

### Step 3: Facade

For your Laravel app, open `config/app.php` and, within the `aliases` array, append:

```
'Harvest' => BestIt\Harvest\Facade\Harvest::class,
```

This will add the Harvest Facade into Laravel.

### Step 4: Publishing config

From the command line, run:

```
php artisan vendor:publish --provider="BestIt\Harvest\HarvestServiceProvider"
```

### Step 5: Configuration

Add the following entries to your environment (.env) file:

```
HARVEST_SERVER_URL // This is required...
HARVEST_USERNAME // This is required...
HARVEST_PASSWORD // This is required...
```

### Usage within Laravel

```php
// Get all users.
$users = Harvest::users()->all();

// For more examples check the ./examples directory.
```

### Usage outside of Laravel

```php
// Load dependencies
require_once __DIR__ . '/vendor/autoload.php';

$url = 'https://company.harvestapp.com';
$username = 'some@email.com'
$password = 'password';

$client = new \BestIt\Harvest\Client($url, $username, $password);

// Get all users.
$users = $client->users()->all();

// For more examples check the ./examples directory.
```

### Todo
- Tests (perhaps use mockable.io?)
- Cover all endpoints