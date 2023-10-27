<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $allowedClientType)
    {
        $user = $request->user();
    
        if ($user && $user->clientType === (int)$allowedClientType) {
            return $next($request);
        }
    
        abort(403, 'Acesso não autorizado.');
    }
    
}
