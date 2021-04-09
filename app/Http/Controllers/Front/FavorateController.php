<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavorateController extends Controller
{
    public function index(){ 

        try{
            $products = auth('user')->user()->favorates()->latest()->get();
            return view('front.favorates', compact('products'));
        }catch(\Exception $ex){
            return back();
        }


    }

    public function favorate(Request $request){

        try{
            if(! auth('user')->user()->favorateHas(request('productId'))){
                auth('user')->user()->favorates()->attach(request('productId'));
                return response() -> json(['status' => true , 'wished' => true]);
            }else{
                return response() -> json(['status' => true , 'wished' => false]);
            }
        }catch(\Exception $ex){
            return back();
        }

    }

    public function unfavorate(){

        try{
            auth('user')->user()->favorates()->detach(request('product_id'));
            return response() -> json(['status' => true , 'wished' => true]);
        }catch(\Exception $ex){
            return back();
        }

    }

    

                                                                    

}
