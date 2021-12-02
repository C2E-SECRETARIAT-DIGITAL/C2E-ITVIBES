<?php
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
            if(env("APP_ENV") == "production"){
                if (!$request->secure()) {
                    return redirect()->secure($request->getRequestUri());
                }
            }

            return $next($request); 
    }
}
?>