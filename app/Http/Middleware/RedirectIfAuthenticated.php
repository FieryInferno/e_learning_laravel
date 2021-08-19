<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  
  public function handle(Request $request, Closure $next, ...$guards)
  {
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
      if (Auth::guard($guard)->check()) {
        switch (auth()->user()->role) {
          case 'admin':
            return redirect('admin');
            break;
  
          case 'guru':
            return redirect('guru');
            break;
  
          case 'siswa':
            return redirect('siswa');
            break;
          
          default:
            # code...
            break;
        }
      }
    }

    return $next($request);
  }
}
