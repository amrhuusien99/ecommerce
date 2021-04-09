<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\AdminPasswordRequest;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Models\Admin;
use App\Models\Role;
use DB;
use Hash;

class AdminController extends Controller
{

    public function index(){
        $admins = Admin::all();
        $roles = Role::all();
        return view('admin.admins.index',compact(['admins', 'roles']));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.admins.create',compact('roles'));
    }

    public function store(CreateAdminRequest $request){

        try{
             // validation 
            DB::beginTransaction();
            // make hash to passwoed
            $request->merge(['password' => bcrypt($request->password)]);
            //create admin
            $admin = Admin::create($request->only(['name', 'email', 'phone', 'role_id', 'password']));
            //save image
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/admins/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $admin->photo = 'files/admin/images/admins/' . $name;
            }
            $admin->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Excrption $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical support");
            return back();
        }

    }

    public function role(Request $request, $id)
    {
        try{
            // validation
            $validator = validator()->make($request->all(),[
                'role_id' => 'required|exists:roles,id',
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // satrt update
            DB::beginTransaction();
            $admin = Admin::findOrFail($id);
            $admin->update([
                'role_id' => $request->input('role_id')
            ]);
            $admin->save();
            DB::commit();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong");
            return back();
        }
    }  

    public function delete($id){

        try{ 

            $admin = Admin::findOrFail($id);
            if(!$admin->photo == null){
                $image_path = public_path( $admin->photo );
                if (unlink($image_path)){
                    $admin->delete();
                    flash()->success("Successed");
                    return back();
                }
            }else{
                $admin->delete();
                flash()->success("Successed");
                return back();
            }
        }catch(\Eception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function admin_info(Request $request){

        if('id'){
            $admin = Auth()->user();
            return view('admin.admins.info',compact('admin'));
        }else{
            flash()->error("There Is Something Wrong");
            return back();
        }

    }

    public function update_admin_info(AdminRequest $request, $id){

        if('id'){
            try{
                //validation
                //find and check row
                DB::beginTransaction();
                $admin = Admin::findOrFail($id);
                //update row in databse
                $admin->update([
                    $admin->email = $request->email,
                    $admin->name = $request->name,
                    $admin->phone = $request->phone,
                    // uploadIamgeAdmin('photo', 'admins', $admin, $request) // this function from helper functions , use it to upload iamge
                ]);
                // update image
                if ($request->hasFile('photo')) {
                    $path = public_path();
                    $destinationPath = $path . '/files/images/admins/'; // upload path
                    $photo = $request->file('photo');
                    $extension = $photo->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                    $photo->move($destinationPath, $name); // uploading file to given path
                    $admin->photo = 'files/images/admins/' . $name;
                }
                $admin->save();
                DB::commit();
                flash()->success("Successed");
                return back();
            }catch (\Exception $ex) {
                DB::rollback();
                flash()->error("There Is Something Wrong , Please Contact Technical Support");
                return back();
            }
        }

    }

    public function admin_password(){

        if('id'){
            $admin = Auth()->user();
            return view('admin.admins.password',compact('admin'));
        }else{
            flash()->error("There Is Something Wrong");
            return back();
        }

    }

    public function update_admin_password(AdminPasswordRequest $request, $id){

        if('id'){
            try{
                // validation
                // find admin
                DB::beginTransaction();
                $admin = Admin::findOrFail($id);
                if(!$admin){
                    flash()->error("Thier Is Something Wrong");
                    return back();
                }
                // check old password
                if(Hash::check($request->input('old-password'),$admin->password)){
                    flash()->error("The Old Password Is Not Correct");
                    return back();
                }
                // save in database
                $admin->update([
                    $admin->password = bcrypt($request->input('password'))
                ]);
                $admin->save();
                Db::commit();
                flash()->success("Success Chenged");
                return back();
            }catch(\Exception $ex){
                DB::rollback();
                flash()->error("There Is Something Wrong , Please Contact Technical Support");
                return back();
            }
        }

    }

    public function activate($id){

        if($id){
            $admin = Admin::findOrFail($id);
            $admin->update(['is_activate' => 1]);
            flash()->success("Success");
            return back();
        }else{
            flash()->error("There Is Something Wrong");
            return back();
        }

    }

    public function deactivate($id){

        if($id){
            $admin = Admin::findOrFail($id);
            $admin->update(['is_activate' => 0]);
            flash()->success("Successed");
            return back();
        }else{
            flash()->error("There Is Something Wrong");
            return back();
        }

    }

}
