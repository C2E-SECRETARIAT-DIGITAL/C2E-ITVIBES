<?php
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {

            // return redirect($to = null, $status = 302, $headers = [], $https = null);

            // dump($request->secure());

            URL::forceScheme('https'); 

            dump($request->secure(url()->full()));

            dd("test");

            if(env("APP_ENV") == "production"){
                if (!$request->secure()) {
                    return redirect()->back($request->getRequestUri());
                }
            }

            dump(config("APP_ENV"));
            dump(config("APP_URL"));
            dump($request->secure());
            dd(env("APP_URL"));

            return $next($request); 
    }
}
?>