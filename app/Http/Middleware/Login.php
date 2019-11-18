<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        if (empty(session("all"))){
        echo '<script>alert("Please login first!!!"); location.href="/login/login"</script>';
     }
         return $next($request);  
    }
}
 