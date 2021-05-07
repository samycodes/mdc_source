<?php

namespace App\Http\Middleware;

use DB;
use Closure;


class CheckAccessToken
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
        $apikey = $request->header('apikey');
        $user_id = $request->header('userid');
        $access_token = $request->header('accesstoken');

        if($apikey == "")
        {
            return response()->json(["status" => 0, "message" => "The apikey field is required."]);
        }

        if($user_id == "")
        {
            return response()->json(["status" => 0, "message" => "The userid field is required."]);
        }

        if($access_token == "")
        {
            return response()->json(["status" => 0, "message" => "The accessToken field is required."]);
        }

        //$apidata = Access_tokens::where('apikey_id', $apikey)->where('user_role', $user_role)->first();
        $access = DB::table('access_token')
            ->join('api_keys', 'api_keys.id', '=', 'access_token.apikey_id')
            ->where('api_keys.apikey', $apikey)
            ->where('access_token.access_token', $access_token)
            ->where('access_token.user_id', $user_id)
            ->select('api_keys.*', 'access_token.*')
            ->first();

        if (!$access) {
            return response()->json(["status" => 0, "message" => "Invalid access token."]);
        }

        return $next($request);
    }
}
