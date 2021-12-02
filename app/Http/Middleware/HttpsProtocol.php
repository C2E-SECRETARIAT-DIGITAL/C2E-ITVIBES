<?php
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        
        $url =$request->url();
        
        if(env("APP_ENV") == "production"){
            $result = explode("://",$url);
            if($result[0] == "http"){
                return redirect()->secure($url);
            }
        }

        return $next($request); 
    }
}
?>