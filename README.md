# API Requirement Test

## Overview

This is a simple one-endpoint API that will return some pre-set products. The API can be run locally with no database required. Products are pre-seeded so no input is necessary.

## Installation

1. Run `composer install` to install all vendor assets
3. Run `php artisan serve` to start a PHP server and navigate to `http://localhost:8000/api/products` for an output of all products

**Note:** For this example and simplicity sake, I've included the already migrated and seeded `database/database.sqlite` file in the repository. You are welcome to `php artisan migrate:fresh -seed` if you like.

## Result Filtering

You can filter using the query params `category` and `price`. They are optional but available for you to use.

In the future, if we wanted more advanced filtering we might use a package such as `spatie/laravel-query-builder` but for this example we kept it simple.

## Testing

There are some tests for the `api/products` endpoint. You can run the tests by running `php artisan test`.
