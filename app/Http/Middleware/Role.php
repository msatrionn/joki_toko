<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array(auth()->user()->level, $levels)) {
            return $next($request);
        }
        if (auth()->user()->level == 'admin') {
            return redirect('admin/dashboard');
        } elseif (auth()->user()->level == 'karyawan') {
            return redirect('admin/dashboard');
        } elseif (auth()->user()->level == 'pembeli') {
            return redirect('/');
        }
        abort(404);
    }
}
