<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoleForAdminMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) { // Проверяем, авторизован ли пользователь
            return redirect('login'); // Если нет, перенаправляем на страницу входа
        }

        $user = Auth::user();

//      if ($user->hasAnyRole(['admin', 'editor']))
        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }

        return redirect('login'); // Если пользователь не имеет нужной роли, перенаправляем на домашнюю страницу или другую страницу
    }
}
