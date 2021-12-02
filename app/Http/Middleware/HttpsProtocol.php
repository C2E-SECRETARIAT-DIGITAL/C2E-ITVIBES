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
                $secure_url = "https://" . $result[1];
                return redirect(secure_url);
            }
        }

        return $next($request); 
    }
}
?>