<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomGuest
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {

        $guards = empty($guards) ? [null] : $guards;


        foreach ($guards as $guard) {
            $user = Auth::guard($guard)->user();


            if ($user) {
                $destination = $guard === 'admin'
                    ? 'back.index'
                    : 'front.index';


                return redirect()->route($destination);
            }
        }

        return $next($request);
    }
}
