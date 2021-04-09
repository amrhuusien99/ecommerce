<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Requests\Vendor\OptionsRequest;
use App\Models\Product;
use App\Models\Attribute;
use DB;
use Auth;

class OptionController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['products'] = Auth::guard('vendor')->user()->products()->active()->select('id')->get();
        $data['attributes'] = Attribute::active()->select('id')->get();
        $data['options'] = Option::orderBy('id', 'DESC')->paginate(50);

        return view('vendor.options.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['products'] = Auth::guard('vendor')->user()->products()->active()->select('id')->get();
        $data['attributes'] = Attribute::active()->select('id')->get();
        
        return view('vendor.options.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionsRequest $request)
    {
        try{
            // validation
            DB::beginTransaction();
            // check product id and attribute id    
            $product = Product::findOrFail($request->product_id);
            $attribute = Attribute::findOrFail($request->attribute_id);
            // start create option
            $option = Option::create($request->only(['product_id', 'attribute_id']));
            // save translation 
            $option->name = $request->name;
            $option->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            // flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return $ex;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionsRequest $request, $id)
    {
        try{
            if('id'){
                // validation
                DB::beginTransaction();
                // check product id and attribute id    
                $product = Product::findOrFail($request->product_id);
                $attribute = Attribute::findOrFail($request->attribute_id);
                // start create option
                $option = Option::findOrFail($id);
                $option->update($request->only(['product_id', 'attribute_id']));
                // save translation 
                $option->name = $request->name;
                $option->save();
                DB::commit();
                flash()->success("Successed");
                return back();
            }else{
                flash()->error("There Is Something Wrong");
                return back();
            }
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try{
            if('id'){
                $option = Option::findOrFail($id);
                $option->delete();
                flash()->success("Successed");
                return back();
            }else{
                flash()->error("The Data Is Not Correct");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    
    }

    public function deactivate($id)
    {
        try{
            if('id'){
                $option = Option::findOrFail($id);
                $option->update(['is_activate' => 0]);
                flash()->success("Successed");
                return back();
            }else{
                flash()->error("The Data Is Not Correct");
                return back();
            }
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please contact Technical Suppoort");
            return back();
        }    

    }

    public function activate($id)
    {
        try{
            if('id'){
                $option = Option::findOrFail($id);
                $option->update(['is_activate' => 1]);
                flash()->success("Successed");
                return back();
            }else{
                flash()->error("The Data Is Not Correct");
                return back();
            }
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
            $option = Option::findOrFail($id);
            $option->translateOrNew('ar')->name = $request->name;
            $option->save();
            DB::commit();
            flash()->success("Successed , AR");
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
        $option = Option::findOrFail($id);
        $option->translateOrNew('es')->name = $request->name;
        $option->save();
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
