<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\Admin\SlidersRequest;
use DB;
use Config;

class SliderController extends Controller
{
    public function index(){

        $sliders = Slider::orderBy('id', 'DESC')->paginate(60);
        return view('admin.sliders.index', compact('sliders'));

    }

    public function create(){
        return view('admin.sliders.create');
    }

    public function store(SlidersRequest $request){

        try{
            // validation 
            // create slider
            DB::beginTransaction();
            $slider = Slider::create($request->except('photo'));
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/sliders/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $slider->photo = 'files/admin/images/sliders/' . $name;
            }
            $slider->save();
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            // flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return $ex;
        }

    }

    public function update(SlidersRequest $request, $id)
    {

        try{
            // validation 
            // find row 
            DB::beginTransaction();
            // update row 
            $slider = Slider::findOrFail($id);
            $slider->update($request->except('token', 'photo'));
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/sliders/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $slider->photo = 'files/admin/images/sliders/' . $name;
            }
            $slider->save();
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
            $slider = Slider::findOrFail($id);
            if(!$slider->photo == null){
                $image_path = public_path( $slider->photo );
                if (unlink($image_path)){
                    $slider->delete();
                    flash()->success("Successed");
                    return back();
                }
            }else{
                $slider->delete();
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
            $slider = Slider::findOrFail($id);
            $slider->update(['is_activate' => 0]);
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
            $slider = Slider::findOrFail($id);
            $slider->update(['is_activate' => 1]);
            flash()->success("Successed Activate");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    

    }

    // set ar language
    public function lang_ar(SlidersRequest $request, $id)
    {
        try{
            // validation
            // satrt create
            DB::beginTransaction();
            // check if exists
            $slider = Slider::findOrFail($id);
            $slider->translateOrNew('ar')->title = $request->title;
            $slider->translateOrNew('ar')->description = $request->description;
            $slider->save();
            DB::commit();
            flash()->success("Successed , AR");  
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back;
        }
    }

    // set es language
    public function lang_es(SlidersRequest $request, $id)
    {
        try{
        // validation
        // satrt create
        DB::beginTransaction();
        // check if exists
        $slider = Slider::findOrFail($id);
        $slider->translateOrNew('es')->title = $request->title;
        $slider->translateOrNew('es')->description = $request->description;
        $slider->save();
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
