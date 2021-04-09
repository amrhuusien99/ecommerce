<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use Hash;
use Auth;

class LoginController extends Controller
{
    
    public function login(){
        return view('front.auth.login');
    }

    public function login_check(LoginRequest $request){

        // check if user is in database
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                if($user->is_activate === 1){    
                    if(Auth::guard('user')->attempt($request->only('email', 'password'))){
                        return redirect(route('home'));
                    }else{
                        flash()->error("There Is Something Wrong");
                        return back();
                    }
                }else{
                    flash()->error("This user Not Active");
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
