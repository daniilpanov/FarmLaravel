<?php

namespace App\Http\Middleware;

use App\Http\Kernel;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class UserSession
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(Request): (Response|RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (!$request->hasCookie('uuid')) {
            $uuid = Str::uuid();

            Kernel::$uuid = $uuid;
            View::share('uuid', $uuid);
            return $next($request)->withCookie(Cookie::make('uuid', $uuid, 0, null, null, false, false));
        } else {
            $uuid = $request->cookie('uuid');

            Kernel::$uuid = $uuid;
            View::share('uuid', $uuid);
            return $next($request);
        }
    }
}
