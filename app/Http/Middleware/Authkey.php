<?php

namespace App\Http\Middleware;

use Closure;
use http\Message;

class Authkey
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
        $key=$request->header('AUTH_TOKEN');
        if (is_null($key)){
            return response()->json(['message'=>'Auth token not found'], 401);
        }
        else if ($key!='3uPbLXj8inPSqrLNHRdo9blZNRIWO8jG'){
            return response()->json(['message'=>'Auth token is not valid'], 401);
        }
        else return $next($request);
    }
}
