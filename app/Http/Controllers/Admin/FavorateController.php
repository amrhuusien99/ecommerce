<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorate;

class FavorateController extends Controller
{
    public function index(){

        $favorates = Favorate::orderBy('id', 'DESC')->paginate(50);
        return view('admin.favorates.index', compact('favorates'));

    }

    public function delete($id){

        try{
            $favorate = Favorate::findOrFail($id);
            $favorate->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }
}
