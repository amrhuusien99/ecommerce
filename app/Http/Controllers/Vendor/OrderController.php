<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class OrderController extends Controller
{
    public function index(){

        try{

            $orders = Order::where('vendor_id', auth()->guard('vendor')->user()->id)->get();
            return view('vendor.orders.index', compact('orders'));

        }catch(\Exception $ex){
            return back();
        }

    }

    public function show($id){

        try{

            $order = Order::findOrFail($id);
            return view('vendor.orders.show', compact('order'));

        }catch(\Exception $ex){
            return back();
        }

    }

    public function delete($id){

        try{

            DB::beginTransaction();
            $order = Order::findOrFail($id);
            $order->delete();
            DB::commit();
            flash()->success("Success Dleted");
            return back();

        }catch(\Exception $ex){
            DB::rollback();
            return back();
        }

    }
}
