<?php
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {

            $url = url()->full();

            $pattern = "/^http/";

            if(preg_match($pattern, $url)){
                dump("http detected");
            }

            dd();

            if(env("APP_ENV") == "production"){
                return redirect()->secure($url);
            }

            return $next($request); 
    }
}
?>