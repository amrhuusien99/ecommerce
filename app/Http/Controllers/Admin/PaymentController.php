<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Requests\Admin\PaymentRequest;
use DB;
use Config;

class PaymentController extends Controller
{
    public function index(){

        $payments = PaymentMethod::orderBy('id', 'DESC')->paginate(50);
        return view('admin.payments.index', compact('payments'));

    }

    public function create(){
        return view('admin.payments.create');
    }

    public function store(PaymentRequest $request){

        try{
            // validation 
            // start create database
            DB::beginTransaction();
            $payment = PaymentMethod::create($request->all());
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            // flash()->error("There Is Something Wrong , Please Contact Technical Suppoet");
            return $ex;
        }

    }

    public function update(PaymentRequest $request, $id){

        try{
            // validation 
            DB::beginTransaction();
            // check if is exists in database
            $payment = PaymentMethod::findOrFail($id);
            // update row 
            $payment->update($request->except('token'));
            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }

    }

    public function delete($id){

        try{
            $payment = PaymentMethod::findOrFail($id);
            $payment->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }

    }

    public function deactivate($id){

        try{
            $payment = PaymentMethod::findOrFail($id);
            $payment->update(['is_activate' => 0]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function activate($id){

        try{
            $payment = PaymentMethod::findOrFail($id);
            $payment->update(['is_activate' => 1]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    // set ar language
    public function lang_ar(PaymentRequest $request, $id)
    {
        try{
            // validation
            // satrt create
            DB::beginTransaction();
            // check if exists
            $payment = PaymentMethod::findOrFail($id);
            $payment->translateOrNew('ar')->name = $request->name;
            $payment->save();
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
    public function lang_es(PaymentRequest $request, $id)
    {
        try{
        // validation
        // satrt create
        DB::beginTransaction();
        // check if exists
        $payment = PaymentMethod::findOrFail($id);
        $payment->translateOrNew('es')->name = $request->name;
        $payment->save();
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
