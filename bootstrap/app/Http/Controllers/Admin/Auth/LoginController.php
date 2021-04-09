<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AdminLoginRequest;
use Hash;
use Auth;

class LoginController extends Controller
{
    
    public function login(){
        return view('admin.auth.login');
    }

    public function login_check(AdminLoginRequest $request){
     
        /////////////////// validation in adminLoginRequest

        $admin = Admin::where('email',$request->email)->first();
        if($admin){
            if(Hash::check($request->password,$admin->password)){
                if(Auth::guard('admin')->attempt($request->only('email', 'password'))){
                    return redirect(route('dashboard'));
                }else{
                    flash()->success("There Is Something Wrong");
                    return back();
                }
            }else{
                flash()->error("There Is Something Wrong");
                return back();
            }
        }else{
            flash()->error("There Is Something Wrong");
            return back();
        }

    }

}
