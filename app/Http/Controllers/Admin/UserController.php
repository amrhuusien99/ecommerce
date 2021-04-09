<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Http\Requests\Admin\UsersRequest;
use DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){

        $users = User::orderBy('id', 'DESC')->paginate(50);
        return view('admin.users.index',compact('users'));

    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(UsersRequest $request){

        try{
            // validation 
            // make password hash
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
            flash()->error("There Is Something Wrong , Please Contact Techical Support");
            return back();
        }

    }

    public function delete($id){

        try{
            $user = user::findOrFail($id);
            if(!$user->photo == null){
                $image_path = public_path( $user->photo );
                if (unlink($image_path)){
                    $user->delete();
                    flash()->success("Successed");
                    return back();
                }
            }else{
                $user->delete();
                flash()->success("Successed");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Sipport");
            return back();
        }

    }

    public function deactivate($id){

        try{
            $user = User::findOrFail($id);
            $user->update(['is_activate' => 0]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function activate($id){

        try{
            $user = User::findOrFail($id);
            $user->update(['is_activate' => 1]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something wrong , Please Contact Technical Support");
            return back();
        }
            
    }

}
