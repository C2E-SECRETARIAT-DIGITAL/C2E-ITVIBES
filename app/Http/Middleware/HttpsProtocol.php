<?php
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {

            $url = url()->full();

            $pattern = "/^(https)/";

            dump($url);

            dd(preg_match('/^(https)/', $url));

            if(preg_match('/^(https)/', $url)){
                dump("https detected");
            }

            dd();

            if(env("APP_ENV") == "production"){
                return redirect()->secure($url);
            }

            return $next($request); 
    }
}
?>