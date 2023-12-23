<?php

namespace App\Http\Middleware;

use App\Models\LoginToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');
        if ($header == '') {
            return response()->json([
                'message' => 'Invalid authorization header',
                'status' => 498,
            ], 498);
        }
        $LoginToken = LoginToken::where('auth_token', $header)->where('auth_user', 3)->first();
        if (!$LoginToken) {
            return response()->json([
                'message' => 'Invalid authorization header',
                'status' => 498,
            ], 498);
        }
        $request->auth_user_id = $LoginToken->auth_user_id;
        return $next($request);
    }
}
