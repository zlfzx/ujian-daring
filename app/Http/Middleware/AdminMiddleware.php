<?php

namespace App\Http\Middleware;

use App\Models\Pengaturan;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $slugAdmin = $request->segment(1);
        $pengaturan = Pengaturan::first();

        if ($slugAdmin != $pengaturan->slug_admin) {
            abort(404);
        }

        return $next($request);
    }
}
