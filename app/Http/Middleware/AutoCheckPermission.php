<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Permission;

class AutoCheckPermission
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
        $routeName = $request->route()->getName();
        // dd($routeName);
        $permission = Permission::whereRaw("FIND_IN_SET ('$routeName', route_name)")->first();
        // dd($permission);
        if(!$permission){
            abort(404);
        }
        if(!Auth::guard('admin')->user()->role->permissionHas($permission->id)){
            abort(403);
        }
        return $next($request);
    }
}
