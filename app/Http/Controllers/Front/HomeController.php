<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Vendor;

class HomeController extends Controller
{
    public function home(){

        $data = [];
        $data['sliders'] = Slider::active()->get(['photo']);
        $data['categories'] = Category::active()->parent()->select('id', 'slug')->with(['childrens' => function ($q){
            $q->select('id', 'parent_id', 'slug');
            $q->with(['childrens' => function ($qq){
                $qq->select('id', 'parent_id', 'slug');
            }]);
        }])->get();
        $data['vendors'] = Vendor::active()->special_vendor()->with(['products' => function($q){
            $q->active()->specialProduct()->get();
        }])->get();

        return view('front.home', $data);

    }
}
