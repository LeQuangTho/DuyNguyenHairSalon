<?php

namespace App\Http\Middleware;

use Closure;

class AdminRole
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
        $user = $request->session()->all();
        // pr($user);
        if(isset($user['quyen']) && $user['quyen'] === 'admin'){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
