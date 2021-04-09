<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(){

        $carts = Cart::orderBy('id', 'DESC')->paginate(50);
        return view('admin.carts.index', compact('carts'));

    }

    public function delete($id){

        try{
            $cart = Cart::findOrFail($id);
            $cart->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }
}
