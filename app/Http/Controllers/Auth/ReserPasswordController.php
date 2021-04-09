<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\Admin\ResetPassword;
use App\Models\Admin;
use App\Models\Vendor;
use App\Http\Requests\Auth\ResetPasswordRequest;
use DB;

class ReserPasswordController extends Controller
{
    public function send_code(){
        return view('auth.sendcode');
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
            $admin = Admin::where('email', $request->email)->first(); 
            if($admin){
                // send code
                $code = rand(1111, 9999);
                $update = $admin->update(['pin_code' => $code]);
                DB::commit();
                if($update){
                    Mail::to($admin->email)
                        ->bcc("amrhuusien99@gmail.com")
                        ->send(New ResetPassword($code));
                    return view('auth.checkpassword');
                }
            }

            // check if vendor is in database
            $vendor = Vendor::where('email', $request->email)->first();
            if($vendor){
                // send code
                $code = rand(1111, 9999);
                $update = $vendor->update(['pin_code' => $code]);
                DB::commit();
                if($update){
                    Mail::to($vendor->email)
                        ->bcc("amrhuusien99@gmail.com")
                        ->send(New ResetPassword($code));
                    return view('auth.checkpassword');
                }
            }else{
                flash()->error("Thier Is Something Wrong");
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
            $admin = Admin::where('phone', $request->phone)->first();
            if($admin){
                // check if is pin code correct
                $code = $admin->where('pin_code', $request->pin_code)->first();
                if(!$code){
                    flash()->error("The Data Is Not Correct");
                    return back();
                }
                // update password
                $admin->password = bcrypt($request->input('password'));
                $admin->pin_code = null;
                $admin->save();
                DB::commit();
                flash()->success("The Password Was Chenged");
                return redirect()->route('dashboard-login');
            }

            // check if is vendor in database
            $vendor = Vendor::where('phone', $request->phone)->first();
            if($vendor){
                // check if is pin code correct
                $code = $vendor->where('pin_code', $request->pin_code)->first();
                if(!$code){
                    flash()->error("The Data Is Not Correct");
                    return back();
                }
                // update password
                $vendor->password = bcrypt($request->input('password'));
                $vendor->pin_code = null;
                $vendor->save();
                DB::commit();
                flash()->success("The Password Was Chenged");
                return redirect()->route('dashboard-login');
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
