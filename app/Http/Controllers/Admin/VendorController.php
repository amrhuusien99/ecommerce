<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Requests\Admin\VendorsRequest;
use DB;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index(){

        $vendors = Vendor::orderBy('id', 'DESC')->paginate(50);
        return view('admin.vendors.index', compact('vendors'));
    
    }

    public function create(){
        return view('admin.vendors.create');
    }

    public function store(VendorsRequest $request){

        try{
            // validation 
            DB::beginTransaction();
            // make password hash
            $request->merge(['password' => bcrypt($request->password)]);
            // store new vendor
            $vendor = Vendor::create($request->except('token', 'photo'));
            // make api token
            $vendor->api_token = Str::random(60);
            //save image
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/vendors/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $vendor->photo = 'files/admin/images/vendors/' . $name;
            }
            $vendor->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function delete($id){

        try{
            $vendor = Vendor::findOrFail($id);
            if(!$vendor->photo == null){
                $image_path = public_path( $vendor->photo );
                if (unlink($image_path)){
                    $vendor->delete();
                    flash()->success("Successed");
                    return back();
                }
            }else{
                $vendor->delete();
                flash()->success("Successed");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

    public function deactivate($id){

        try{
            $vendor = Vendor::findOrFail($id);
            $vendor->update(['is_activate' => 0]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

    public function activate($id){

        try{
            $vendor = Vendor::findOrFail($id);
            $vendor->update(['is_activate' => 1]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

    public function unspecial($id){

        try{
            $vendor = Vendor::findOrFail($id);
            $vendor->update(['special_vendor' => 0]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

    public function special($id){

        try{
            $vendor = Vendor::findOrFail($id);
            $vendor->update(['special_vendor' => 1]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

}
