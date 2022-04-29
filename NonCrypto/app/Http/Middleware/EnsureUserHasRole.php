<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $privilege)
    {
        
        $rolelist= $request->user()->roles()->get();
        foreach ($rolelist as $role) {
            if ($role->rolename->where('name', $privilege)->exists()) {
                return $next($request);
            }
        }      
        abort (403);
     }
      
    }
