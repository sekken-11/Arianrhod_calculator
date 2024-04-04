<?php

namespace App\Http\Middleware;

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
        // ユーザーが admin レベルであることをチェック
        if ($request->user() && $request->user()->level === 'admin') {
            return $next($request);
        }

        // ユーザーが admin レベルでない場合は、ダッシュボードに戻る
        return redirect()->route('dashboard'); 
    }
}
