<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
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

        $statue= Auth::user()->status;
        if( $statue == 0){
            return redirect()->back()->with('message','الرجاء انتظاار تفعيل حسابك من قبل الادمن');
        }
        return $next($request);
    }
}
