<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use DB;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        try{
            $roles = Role::all();
            return view('admin.roles.index',compact('roles'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong");
            return back();
        }
    }

    public function create(){
        try{
            $permissions = Permission::all();
            return view('admin.roles.create',compact('permissions'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong");
            return back();        
        }
    }
    
    public function store(Request $request)
    {
        try{
            // validation
            $validator = validator()->make($request->all(),[
                'name' => 'required|unique:roles,name',
                'permission_id' => 'required',
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // satrt create
            DB::beginTransaction();
            // dd($request->permission_id);
            $role = Role::create(['name' => $request->input('name')]);
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong");
            return back();
        }

    }
        
    public function edit($id)
    {
        try{
            $role = Role::findOrFail($id);
            $permissions = Permission::all();
            return view('admin.roles.edit',compact(['role', 'permissions']));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong");
            return back();
        }
    }
    
    public function update(Request $request, $id)
    {
        try{
            // validation
            $validator = validator()->make($request->all(),[
                'name' => 'required|unique:roles,name,'. $id,
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // satrt update
            DB::beginTransaction();
            $role = Role::findOrFail($id);
            $role->update([
                'name' => $request->input('name')
            ]);
            $role->permissions()->sync($request->permission_id);
            $role->save();
            DB::commit();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong");
            return back();
        }
    }  
    
    public function delete($id)
    {
        try{
            $role = Role::findOrFail($id);
            $role->delete();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong");
            return back();
        }
    }
}