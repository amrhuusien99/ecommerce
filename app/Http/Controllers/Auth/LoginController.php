<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use App\Http\Requests\Auth\LoginRequest;
use Hash;
use Auth;

class LoginController extends Controller
{
    
    public function login(){
        return view('auth.login');
    }

    public function login_check(LoginRequest $request){
    
        // validation in LoginRequest
        // check if admin is in database
        $admin = Admin::where('email',$request->email)->first();
        if($admin){
            if(Hash::check($request->password,$admin->password)){
                if($admin->is_activate === 1){    
                    if(Auth::guard('admin')->attempt($request->only('email', 'password'))){
                        return redirect(route('dashboard'));
                    }else{
                        flash()->error("There Is Something Wrong");
                        return back();
                    }
                }else{
                    flash()->error("You Are Not Active");
                    return back();
                }
            }else{
                flash()->error("The Password Is Not Correct");
                return back();
            }
        }

        // check if vendor is in database
        $vendor = Vendor::where('email',$request->email)->first();
        if($vendor){
            if(Hash::check($request->password,$vendor->password)){
                if($vendor->is_activate === 1){    
                    if(Auth::guard('vendor')->attempt($request->only('email', 'password'))){
                        return redirect(route('vendor-dashboard'));
                    }else{
                        flash()->error("There Is Something Wrong");
                        return back();
                    }
                }else{
                    flash()->error("This Vendor Not Active");
                    return back();
                }
            }else{
                flash()->error("The Password Is Not Correct");
                return back();
            }
        }else{
            flash()->error("The Email Is Not Correct");
            return back();
        }

    }

}
