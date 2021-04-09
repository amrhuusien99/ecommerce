<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class OrderController extends Controller
{
    public function index(){

        try{

            $orders = Order::all();
            return view('admin.orders.index', compact('orders'));

        }catch(\Exception $ex){
            return back();
        }

    }

    public function show($id){

        try{

            $order = Order::findOrFail($id);
            return view('admin.orders.show', compact('order'));

        }catch(\Exception $ex){
            return back();
        }

    }

}
