# Cross-origin resource sharing for laravel applications

This package give's a middleware to allow for resource sharing across different origins useful 
for api development with laravel. *This package is still in development more options will be added*

### Usage

Require the package through composer

```
composer require mahmoud-birdsol/cors-laravel:1.0.0-beta
```

Add the service provider to the app service providers in `config/app.php`

```
/*
* Other Service Providers...
*/
MahmoudBirdsol\CORSLaravel\CORSServiceProvider::class,
```

Publish the config file (cors.php) 

```
php artisan vendor:publish --provider="MahmoudBirdsol\CORSLaravel\CORSServiceProvider"
```

Add the middleware to the api route group

```
'api' => [
    'throttle:60,1',
    MahmoudBirdsol\CORSLaravel\CORSMiddleware::class,
],
```

Modify the `config/cors.php` file sensible defaults exist for all options except for the allowed origins.

```
<?php
/*
|--------------------------------------------------------------------------
| CORS, Cross Origin Resource Sharing Config File
|--------------------------------------------------------------------------
|
*/
return [
    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | These are the allowed origins to make requests to this application
    | you can add as many origins as your application requires to this
    | array each request will be validated through the middleware.
    |
    | To make all origins allowed just remove the array syntax
    | and add *
    |
    */

    'origins' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Access control allow credentials
    |--------------------------------------------------------------------------
    |
    | The credentials variable can be either true or false.
    |
    */
    'credentials' => true,

    /*
    |--------------------------------------------------------------------------
    | Allowed methods for a CORS request
    |--------------------------------------------------------------------------
    */
    'methods' => [
        'GET',
        'POST',
        'PATCH',
        'PUT',
        'DELETE',
        'OPTIONS'
    ],

    /*
    |--------------------------------------------------------------------------
    | Allowed headers for a CORS request
    |--------------------------------------------------------------------------
    */
    'headers' => [
        'Origin',
        'Content-Type',
        'X-Auth-Token',
        'X-Requested-With',
        'Authorization',
        'Accept',
    ]

];
```

And that's it

### Extended usage

In most cases you would want to exclude the api route's from the VerifyCsrfToken middleware so in 
add the api prefix to the except array in the middleware

```
protected $except = [
    'api/*'
];
```

As an alternative you can have a different routes file for your api routes 
first create the routes file `routes.api.php` next go to `RouteServiceProvider.php` and add the this function 

```
/**
 * Define the "api" routes for the application.
 *
 * These routes receive the api route group middlewares.
 *
 * @param  \Illuminate\Routing\Router  $router
 * @return void
 */
protected function mapApiRoutes(Router $router)
{
    $router->group([
        'namespace' => $this->namespace, 'middleware' => 'api',
    ], function ($router) {
        require app_path('Http/routes.api.php');
    });
}
```

And don't forget to call this function in the `RouteServiceProvider.php` `map` function 
 
```
/**
 * Define the routes for the application.
 *
 * @param  \Illuminate\Routing\Router  $router
 * @return void
 */
public function map(Router $router)
{
    $this->mapWebRoutes($router);
    $this->mapApiRoutes($router);
}
```

### For usage with [dingo api] (https://github.com/dingo/api)

In the `config/api.php` add the middle ware to default list of API middleware

```
/*
|--------------------------------------------------------------------------
| API Middleware
|--------------------------------------------------------------------------
|
| Middleware that will be applied globally to all API requests.
|
*/
'middleware' => [
    MahmoudBirdsol\CORSLaravel\CORSMiddleware::class,
],
```

### License

Released under the MIT License, see LICENSE.

