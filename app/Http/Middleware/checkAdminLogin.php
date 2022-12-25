<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userName = $request->session()->get('username');
        if(!$this->checkLogin($userName))
        {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
    private function checkLogin($userName)
    {
        if(!empty($userName)){
            return true;
        }
        return false;
    }
}
