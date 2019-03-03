<?php
/**
 * Created by PhpStorm.
 * User: lananh
 * Date: 2019-03-03
 * Time: 21:58
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class Locale
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('language')) {
            Session::put('language', config('app.locale'));
        }
        Lang::setLocale(Session::get('language'));
        return $next($request);
    }


}