<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Lang;

class AuthPipelineTechnology
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
        $user = User::where('active', 1)->where('id', auth()->user()->id)->first();
        if ($user) {
            return $next($request);
        }
        return redirect()->route('index')->with('getError', Lang::get('messages.no_access'));
    }
}