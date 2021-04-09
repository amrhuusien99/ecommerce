<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Requests\Vendor\AttributesRequest;
use DB;

class AttributeController extends Controller
{
    public function index()
    {

        $attributes = Attribute::orderBy('id','DESC') -> paginate(20);
        return view('vendor.attributes.index', compact('attributes'));

    }

    public function create(){
        
        return view('vendor.attributes.create');
 
    }

    public function store(AttributesRequest $request)
    {

        try{
            // validation 
            // store in database
            DB::beginTransaction();
            $attribute = Attribute::create($request->except('token'));
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(AttributesRequest $request, $id)
    {

        try{
            // validation 
            // find row 
            DB::beginTransaction();
            $attribute = Attribute::findOrFail($id);
            // update row 
            $attribute->update($request->except('token'));
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
            $attribute = Attribute::findOrFail($id);
            $attribute->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function deactivate($id)
    {
        try{
            $attribute = Attribute::findOrFail($id);
            $attribute->update(['is_activate' => 0]);
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
            $attribute = Attribute::findOrFail($id);
            $attribute->update(['is_activate' => 1]);
            flash()->success("Successed Activate");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    

    }

    // set ar language
    public function lang_ar(Request $request, $id)
    {
        try{
            // validation
            $validate = validator()->make($request->all(),[
                'name' => 'required'
            ]);
            if($validate->fails()){
                flash()->error($validate->errors()->first());
                return back();
            }
            // satrt create
            DB::beginTransaction();
            // check if exists
            $attribute = Attribute::findOrFail($id);
            $attribute->translateOrNew('ar')->name = $request->name;
            $attribute->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    // set es language
    public function lang_es(Request $request, $id)
    {
        try{
        // validation
        $validate = validator()->make($request->all(),[
            'name' => 'required'
        ]);
        if($validate->fails()){
            flash()->error($validate->errors()->first());
            return back();
        }
        // satrt create
        DB::beginTransaction();
        // check if exists
        $attribute = Attribute::findOrFail($id);
        $attribute->translateOrNew('es')->name = $request->name;
        $attribute->save();
        DB::commit();
        flash()->success("Successed , ES");
        return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
