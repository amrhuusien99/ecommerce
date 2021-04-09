<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Requests\Vendor\VendorRequest;
use App\Http\Requests\Vendor\VendorPasswordRequest;
use DB;
use Hash;

class VendorController extends Controller
{
    public function info($id){

        $vendor = Vendor::findOrFail($id);
        return view('vendor.vendor.info', compact('vendor'));

    }

    public function update(VendorRequest $request, $id){

        try{
            // validation 
            DB::beginTransaction();
            // check if is exists 
            $vendor = Vendor::findOrFail($id);
            // update row
            $vendor->update($request->except('token', 'photo'));
            // if is there photo
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
            flash()->success("Successed Update");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function vendor_password($id){

        $vendor = Vendor::findOrFail($id);
        return view('vendor.vendor.password', compact('vendor'));

    }

    public function update_vendor_password(VendorPasswordRequest $request, $id){

        if('id'){
            try{
                // validation
                // find vendor
                DB::beginTransaction();
                $vendor = Vendor::findOrFail($id);
                if(!$vendor){
                    flash()->error("Thier Is Something Wrong");
                    return back();
                }
                // check old password
                if(Hash::check($request->input('old-password'),$vendor->password)){
                    flash()->error("The Old Password Is Not Correct");
                    return back();
                }
                // save in database
                $vendor->update([
                    $vendor->password = bcrypt($request->input('password'))
                ]);
                $vendor->save();
                DB::commit();
                flash()->success("Success Chenged");
                return back();
            }catch(\Exception $ex){
                DB::rollback();
                flash()->error("There Is Something Wrong , Please Contact Technical Support");
                return back();
            }
        }

    }

    public function state($id){

        try{

            DB::beginTransaction();
            // find vendor in database
            $vendor = Vendor::findOrFail($id);

            // update state 
            if($vendor->state == 'close'){
                $vendor->state = 'open';
            }else{
                $vendor->state = 'close';
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
}
