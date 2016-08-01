<?php

namespace MahmoudBirdsol\CORSLaravel;

class CORSHelper
{
    /**
     * Perform the Cors checks.
     *
     * @return mixed
     */
    public static function perform()
    {
        return (new static)->handle();
    }

    /**
     * Handle a cors request.
     */
    public function handle()
    {
        $this->origins();
        $this->credentials();
        $this->methods();
        $this->headers();
    }

    /**
     * Set access control origins.
     */
    private function origins()
    {
        if(array_has($_SERVER, 'HTTP_ORIGIN')){
            foreach (config('cors.origins') as $origin) {
                if ($_SERVER['HTTP_ORIGIN'] == $origin) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                    break;
                }
            }

            if(config('cors.origins') == '*'){
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            }
        }


        if(!array_has($_SERVER, 'HTTP_ORIGIN') &&
            env('APP_ENV') != 'local' &&
            config('cors.local') != 'true' &&
            config('cors.internal') == false){

            abort(403);
        }
    }

    /**
     * Set access control credentials
     */
    private function credentials()
    {
        header('Access-Control-Allow-Credentials: ' . config('cors.credentials'));
    }

    /**
     * set access control methods
     */
    private function methods()
    {
        $methods = '';
        foreach (config('cors.methods') as $method) {
            $methods = $methods . $method . ', ';
        }
        header('Access-Control-Allow-Methods: ' . $methods);
    }

    /**
     * Set access control headers.
     */
    private function headers()
    {
        $headers = '';
        foreach (config('cors.headers') as $header) {
            $headers = $headers . $header . ', ';
        }
        header('Access-Control-Allow-Headers: ' . $headers);
    }
}