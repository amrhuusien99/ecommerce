<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\Admin\BrandsRequest;
use DB;
use Config;

class BrandController extends Controller
{
    public function index()
    {

        $brands = Brand::orderBy('id','DESC') -> paginate(20);
        return view('admin.brands.index', compact('brands'));

    }

    public function create(){
        
        return view('admin.brands.create');

    }

    public function store(BrandsRequest $request)
    {

        try{
            // validation 
            // store in database
            DB::beginTransaction();
            $brand = Brand::create($request->except('photo'));
            // if is set photo
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/brands/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $brand->photo = 'files/admin/images/brands/' . $name;
            }
            $brand->save();
            flash()->success("Success");
            DB::commit();
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(BrandsRequest $request, $id)
    {

        try{
            // validation 
            // find row 
            DB::beginTransaction();
            $brand = Brand::findOrFail($id);
            // update row 
            $brand->update($request->except('token', 'photo'));
            // is is set photo
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/brands/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $brand->photo = 'files/admin/images/brands/' . $name;
            }
            $brand->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {

        try{
            $brand = Brand::findOrFail($id);
            if(!$brand->photo == null){
                $image_path = public_path( $brand->photo );
                if (unlink($image_path)){
                    $brand->delete();
                    flash()->success("Successed");
                    return back();
                }
            }else{
                $brand->delete();
                flash()->success("Successed");
                return back();
            }
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function deactivate($id)
    {
        try{
            $brand = Brand::findOrFail($id);
            $brand->update(['is_activate' => 0]);
            flash()->success("Successed Deactivate");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please contact Technical Suppoort");
            return back();
        }    

    }

    public function activate($id)
    {
        try{
            $brand = Brand::findOrFail($id);
            $brand->update(['is_activate' => 1]);
            flash()->success("Successed Activate");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    

    }

    // set ar language
    public function lang_ar(BrandsRequest $request, $id)
    {
        try{
            // validation
            // satrt create
            DB::beginTransaction();
            // check if exists
            $brand = Brand::findOrFail($id);
            $brand->translateOrNew('ar')->name = $request->name;
            $brand->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back;
        }
    }

    // set es language
    public function lang_es(BrandsRequest $request, $id)
    {
        try{
        // validation
        // satrt create
        DB::beginTransaction();
        // check if exists
        $brand = Brand::findOrFail($id);
        $brand->translateOrNew('es')->name = $request->name;
        $brand->save();
        DB::commit();
        flash()->success("Successed , ES");
        return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back;
        }
    }

}
