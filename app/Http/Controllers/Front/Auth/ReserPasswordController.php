<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\Site\ResetPassword;
use App\Models\User;
use App\Http\Requests\Auth\ResetPasswordRequest;
use DB;

class ReserPasswordController extends Controller
{
    public function send_code(){
        return view('front.auth.sendcode');
    }

    public function check_password(Request $request){

        // validation
        $validator = validator()->make($request->all(),[
            'email' => 'required|email'
        ]);
        if(!$validator){
            flash()->error($validator->errors()->first());
            return back();
        }
        try{
            DB::beginTransaction();
            // check if admin is in database
            $usder = User::where('email', $request->email)->first();
            if($usder){
                // send code
                $code = rand(1111, 9999);
                $update = $usder->update(['pin_code' => $code]);
                DB::commit();
                if($update){
                    Mail::to($usder->email)
                        ->bcc("amrhuusien99@gmail.com")
                        ->send(New ResetPassword($code));
                    return view('front.auth.checkpassword');
                }
            }else{
                flash()->error("This Account Not Exists");
                return back();
            }
        }catch (\Exception $ex) {
            DB::rollback();
            flash()->error("Thire Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update_password(ResetPasswordRequest $request){
        
        // validation 
        // check if is exsist
        try{
            DB::beginTransaction();
            // check if is admin in database
            $user = User::where('phone', $request->phone)->first();
            if($user){
                // check if is pin code correct
                $code = $user->where('pin_code', $request->pin_code)->first();
                if(!$code){
                    flash()->error("The Data Is Not Correct");
                    return back();
                }
                // update password
                $user->password = bcrypt($request->input('password'));
                $user->pin_code = null;
                $user->save();
                DB::commit();
                flash()->success("The Password Was Chenged");
                return redirect()->route('site/login');
            }else{
                flash()->success("This Account Not Exists");
                return back();
            }
            
        }catch (\Exception $ex) {
            DB::rollback();
            flash()->error("Thire Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }
}
