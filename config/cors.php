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