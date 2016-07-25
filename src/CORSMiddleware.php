<?php

namespace MahmoudBirdsol\CORSLaravel;

use Closure;
use MahmoudBirdsol\CORSLaravel\CORSHelper;

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
        
        CORSHelper::perform();

        return $next($request);
    }
}



//        if( ! $request->isMethod('options')) {
//            return $next($request);
//        }
