<?php
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {

        
            $url =$request->url() ;
            $pattern = "/^(https)/";
            dump("rr");
            dump($url);

            $result = str_split("https://",$url);

            dump($result);

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