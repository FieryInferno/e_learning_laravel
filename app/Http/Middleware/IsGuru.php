<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGuru
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'guru') {
      abort(404);
    }
    
    return $next($request);
  }
}
