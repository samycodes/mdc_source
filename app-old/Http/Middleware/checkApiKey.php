<?php

namespace App\Http\Middleware;

use Closure;
use App\Objects\APIKey;

class checkApiKey
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
        $key = $request->header('apikey');
        $user_role = $request->header('userrole');
        $device_type = $request->header('devicetype');

        if($key == ''){

            return \Response::json(
                [
                    "status" => 0,
                    "message" => "The apikey field is required !",
                ]
            );
        }

        if($device_type == ''){
            return \Response::json(
                [
                    "status" => 0,
                    "message" => "The device type field is required !",
                ]
            );
        }

        $record = APIKey::where('apikey', $key)->first();

        if(!isset($record)){
            return \Response::json(
                [
                    "status" => 401,
                     "message" => "Your Account is Inactive,Please Contact Administrator Active It!",
                ]
            );
        }


        return $next($request);
    }
}
