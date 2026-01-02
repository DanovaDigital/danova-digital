<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSessionAuth
{
    public const SESSION_KEY = 'admin_authed';
    public const INTENDED_URL_KEY = 'admin.intended_url';

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get(self::SESSION_KEY) === true) {
            return $next($request);
        }

        $request->session()->put(self::INTENDED_URL_KEY, $request->fullUrl());

        return redirect()->route('admin.login');
    }
}
