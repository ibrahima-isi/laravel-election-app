<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }
        // deconnexion avant redirection vers login page.
        auth()->logout();
        return redirect()->intended(route('auth.login'))
            ->with('error','Vous etes pas admin'); // Rediriger l'utilisateur normal (non-admin) vers la page d'accueil
    }


}
