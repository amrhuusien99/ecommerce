<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\MainCategoriesRequest;
use DB;

class MainCategoryController extends Controller 
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::parent()->orderBy('id','DESC') -> paginate(20);
        // dd($categories);
        return view('admin.maincategories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maincategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoriesRequest $request)
    {
        try{
            // validation 
            // satrt create
            DB::beginTransaction();
            $category = Category::create($request->all());
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // try{
        //     if('id'){
        //         $category = Category::findOrFail($id);
        //         return view('admin.maincategories.edit', compact('category'));
        //     }else{
        //         flash()->error("The Data Is Not Correct");
        //         return back();
        //     }
        // }catch(\Exception $ex){
        //     flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
        //     return back();
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMainCategory(MainCategoriesRequest $request, $id)
    {
        try{
            if('id'){
                // validation  
                // find row and check if row in database
                DB::beginTransaction();
                $category = Category::findOrFail($id);
                // update row 
                $category->update($request->except('_token', 'id'));
                // update translation
                $category->name = $request->name;
                $category->save();
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
    public function destroy($id)
    {
        try{
            if('id'){
                $category = Category::orderBy('id', 'DESC')->findOrFail($id);
                $category->delete();
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
                $category = Category::findOrFail($id);
                $category->update(['is_activate' => 0]);
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
                $category = Category::findOrFail($id);
                $category->update(['is_activate' => 1]);
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
            $category = Category::findOrFail($id);
            $category->translateOrNew('ar')->name = $request->name;
            $category->save();
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
        $category = Category::findOrFail($id);
        $category->translateOrNew('es')->name = $request->name;
        $category->save();
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
