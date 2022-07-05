<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$roles)
    {
        $user = $request->user();
        if(!$user->hasRole($roles)){
            return  response(['messenge' =>'Invalid role'],400);
        }
        
        switch ($request->method()) {
            case 'GET':
                if(!$user->hasPermissionTo('SHOW')){
                    return  response(['messenge' =>'Invalid permission'],400);
                }
                break;
            case 'PATCH':
            case 'PUT':
                if(!$user->hasPermissionTo('WRITE') || $user->hasRole('STUDENT')&&$request->route()->named('course.update') ){
                    return  response(['messenge' =>'Invalid permission'],400);
                }
                break;
            case 'POST':
                if(!$user->hasPermissionTo('WRITE') || $user->hasRole('STUDENT')&&$request->route()->named('course.store') ){
                    return  response(['messenge' =>'Invalid permission'],400);
                }
                break;
            case 'DELETE':
                if(!$user->hasPermissionTo('DELETE')){
                    return  response(['messenge' =>'Invalid permission'],400);
                }
                break;
        }
        
        return  $next($request);
    }
}
