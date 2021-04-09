<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Front\UserRegisterRequest;
use DB;

class UserController extends Controller
{

    public function info($id){

        try{

            $user = auth()->guard('user')->user()->id;
            if($user == $id){
                return view('front.account');
            }else{
                return back();
            }

        }catch(\Exception $ex){
            return back();
        }

    }

    public function update(UserRegisterRequest $request){

        try{
           
            DB::beginTransaction();
            
            // check if is exists
            $user = User::findOrFail($request->user_id);
            // update row 
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            //save image
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/users/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $user->photo = 'files/admin/images/users/' . $name;
            }
            if(! $request->password == null){
                // make password hashed
                $request->merge(['password' => bcrypt($request->password)]);
                $user->update([
                    'password' => $request->password,
                ]);
            }
            $user->save();
            DB::commit();
            flash()->success("Successed");
            return back();
            
        }catch(\Exception $ex){
            DB::rollback();
            return $ex;
        }

    }

}
