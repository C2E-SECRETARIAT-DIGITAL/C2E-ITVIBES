<?php
namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Log;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        
        $url = $request->url();

        dump($_SERVER);
        
        if(env("APP_ENV") == "production"){
            $result = explode("://",$url);

            dump($result);
            dd($result[0] == "http");

            if($result[0] == "http"){
                $secure_url = "https://" . $result[1];
                return redirect($secure_url);
            }
        }

        return $next($request); 
    }
}
?>