<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function products_in_category($slug){

        $data = [];
        $data['category'] = Category::active()->where('slug', $slug)->first();
        if($data['category']){
            $data['products'] = $data['category']->products()->active()->get();
        }

        return view('front.products', $data);

    }
}
