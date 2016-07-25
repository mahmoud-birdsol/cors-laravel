<?php
/*
|--------------------------------------------------------------------------
| CORS Cross Origin Request Service
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
    */

    'origins' => [
        'http://themommyclub.dev',
        'http://admin.themommyclub.dev',
        'http://app.themommyclub.dev',
    ],

    // Access control allow credentials true or false.
    'credentials' => true,

    // Access control allow methods.
    'methods' => [
        'GET',
        'POST',
        'PATCH',
        'PUT',
        'DELETE',
        'OPTIONS'
    ],

    // Access control allow headers.
    'headers' => [
        'Origin',
        'Content-Type',
        'X-Auth-Token',
        'X-Requested-With',
        'Authorization',
        'Accept',
    ]

];