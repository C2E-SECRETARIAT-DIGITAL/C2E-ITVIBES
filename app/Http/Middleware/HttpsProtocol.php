<?php
namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Log;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        
        $url = $request->url();
        
        if(env("APP_ENV") == "production"){
            $result = explode("://",$url);

            Log::emergency($result);
            Log::error($result);
            Log::debug($result);

            if($result[0] == "http"){
                $secure_url = "https://" . $result[1];
                return redirect($secure_url);
            }
        }

        return $next($request); 
    }
}
?>