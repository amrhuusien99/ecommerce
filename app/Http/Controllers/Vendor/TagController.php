<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Admin\TagsRequest;
use DB;
use Config;

class TagController extends Controller
{
    public function index()
    {

        $tags = auth()->guard('vendor')->user()->tags()->orderBy('id')->paginate(50);
        return view('vendor.tags.index', compact('tags'));

    }

    public function create(){
        
        return view('vendor.tags.create');
 
    }

    public function store(TagsRequest $request)
    {

        try{
            // validation 
            // store in database
            DB::beginTransaction();
            $tag = Tag::create($request->all());
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(TagsRequest $request, $id)
    {

        try{
            // validation 
            // find row 
            DB::beginTransaction();
            $tag = Tag::findOrFail($id);
            // update row 
            $tag->update($request->except('token'));
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
            $tag = Tag::findOrFail($id);
            $tag->delete();
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
            $tag = Tag::findOrFail($id);
            $tag->update(['is_activate' => 0]);
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
            $tag = Tag::findOrFail($id);
            $tag->update(['is_activate' => 1]);
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
            $tag = Tag::findOrFail($id);
            $tag->translateOrNew('ar')->name = $request->name;
            $tag->save();
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
        $tag = Tag::findOrFail($id);
        $tag->translateOrNew('es')->name = $request->name;
        $tag->save();
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
