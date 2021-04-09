<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('id', 'DESC')->paginate(50);
        return view('admin.products.index', compact('products'));

    }

    public function show($id){

        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));

    }

}
