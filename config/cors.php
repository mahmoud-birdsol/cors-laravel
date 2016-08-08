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
    | Local environment
    |--------------------------------------------------------------------------
    |
    | This options will simple allow for requests without HTTP_ORIGIN to go
    | through if set to true an will abort with an unauthorized response
    | if false. Also note if the APP_ENV is not set to local in .env
    | file this option will be overridden by the .env file option.
    |
    */

    'local' => true,

    /*
    |--------------------------------------------------------------------------
    | Internal Requests
    |--------------------------------------------------------------------------
    |
    | Internal will simply allow for internal api requests the default is true
    | but change to false if you'r app is just an api layer. If set true it
    | will allow for dingo API internal requests other wise se to false.
    |
    */

    'internal' => true,

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
        // Add origins Here
        '*',
    ],

    /*
    |--------------------------------------------------------------------------
    | Access control allow credentials
    |--------------------------------------------------------------------------
    |
    | The credentials variable can be either true or false.
    |
    */
    'credentials' => 'true',

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