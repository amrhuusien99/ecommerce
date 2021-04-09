<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Front\UserRegisterRequest;
use DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){

        try{
            return view('front/auth/register');
       }catch(\Exception $ex){
           return back();
       }

    }

    public function store(UserRegisterRequest $request){

        try{

            DB::beginTransaction();
            $request->merge(['password' => bcrypt($request->password)]);
            // start create in database 
            $user = User::create($request->except('photo'));
            // make api token
            $user->api_token = Str::random(60);
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
            $user->save();
            DB::commit();
            flash()->success("Successed");
            return back();


        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }
}
