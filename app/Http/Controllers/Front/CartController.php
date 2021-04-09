<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{

    public function index(){
        
        try{

            $data = [];
            $products = auth('user')->user()->carts()->get();
            if( count($products) > 0 ){
                foreach($products as $product){
                    $price = $product->special_price == null ? $product->price : $product->special_price ;
                    $delivery = $product->vendor->delivery_cost ;
                    $subTotel [] = $price + $delivery;
                }
                $amount = array_sum($subTotel);
                return view('front.carts', compact(['products', 'amount']));
            }
            return view('front.carts');
        }catch(\Exception $ex){
            return $ex;
        }

    }

    public function store(Request $request){

        try{

            DB::beginTransaction();

            if(!auth('user')->user()->cartHas(request('product_id'))){
                auth('user')->user()->carts()->attach(request('product_id'));
                DB::commit();
                return response() -> json(['status' => true , 'added' => true]);
            }else{
                return response() -> json(['status' => true , 'added' => false]);
            }

        }catch(\Exception $ex){
            DB::rollback();
            return back();
        }

    }

    public function delete(Request $request){

        try{

            DB::beginTransaction();

            if(auth('user')->user()->cartHas(request('productId'))){
                auth('user')->user()->carts()->detach(request('productId'));
                DB::commit();
                return response() -> json(['status' => true , 'delete' => true]);
            }else{
                return response() -> json(['status' => true , 'delete' => false]);
            }

        }catch(\Exception $ex){
            DB::rollback();
            return $ex;
        }

    }

}