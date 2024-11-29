<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {   
        // ユーザーがログインしていない場合
        if (!Auth::check()) {
            return redirect()->route('admin.admin_login');
        }

        // 指定されたロールと一致しない場合に404エラー
        if (Auth::user()->role != $role) {
            abort(404, 'Not found!');
        }

        // ユーザーのロールが 'admin' でない場合はリダイレクト
        if ($role === 'admin' && Auth::user()->role != 'admin') {
            return redirect()->route('user.home');
        }

        return $next($request);
    }
}
