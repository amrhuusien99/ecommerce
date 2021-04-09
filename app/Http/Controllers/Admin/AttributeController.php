<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute; 

class AttributeController extends Controller
{
    
    public function index()
    {

        $attributes = Attribute::orderBy('id','DESC') -> paginate(20);
        return view('admin.attributes.index', compact('attributes'));

    }

    public function delete($id)
    {

        try{
            $attribute = Attribute::findOrFail($id);
            $attribute->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
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

}
