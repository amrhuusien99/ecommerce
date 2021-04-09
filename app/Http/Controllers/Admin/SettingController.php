<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Admin\SettingsRequest;
use DB;

class SettingController extends Controller
{
    public function index(){

        $settings = Setting::orderBy('id','DESC') -> paginate(50);
        return view('admin.settings.index',compact('settings'));

    }

    public function update(SettingsRequest $request, $id){

        try{
            // validation
            DB::beginTransaction();
            $setting = Setting::findOrFail($id);
            // update row
            $setting->update($request->except('token'));
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical support");
            return back();
        }

    }
}
