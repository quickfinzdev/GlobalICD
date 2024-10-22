<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestToken = $request->header('token');

        if (empty($requestToken)) {
            return response()->json(['message' => 'Invalid Token'], 401);
        }

        $user = User::where('remember_token', $requestToken)->first();

        if ($user) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
