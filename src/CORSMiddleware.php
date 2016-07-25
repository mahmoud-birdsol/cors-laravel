<?php

namespace MahmoudBirdsol\CORSLaravel;

use Closure;

class CORSMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->origins();
        $this->credentials();
        $this->methods();
        $this->headers();


        if( ! $request->isMethod('options')) {
            return $next($request);
        }

        return $next($request);
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
