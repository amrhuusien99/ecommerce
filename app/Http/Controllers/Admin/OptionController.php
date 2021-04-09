<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller 
{
    
    public function index()
    {
        $options = Option::orderBy('id', 'DESC')->paginate(50);
        return view('admin.options.index', compact('options'));
    }

    public function delete($id)
    {
        try{
            $option = Option::findOrFail($id);
            $option->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    
    }

    public function deactivate($id)
    {
        try{
            $option = Option::findOrFail($id);
            $option->update(['is_activate' => 0]);
            flash()->success("Successed");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please contact Technical Suppoort");
            return back();
        }    

    }

    public function activate($id)
    {
        try{
            $option = Option::findOrFail($id);
            $option->update(['is_activate' => 1]);
            flash()->success("Successed");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    

    }

}
