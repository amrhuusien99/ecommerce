<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Brand;
use App\Http\Requests\Vendor\GeneralProductRequest;
use App\Http\Requests\Vendor\ProductPriceRequest;
use App\Http\Requests\Vendor\ProductStockRequest;
use App\Http\Requests\Vendor\ProductLangRequest;
use App\Http\Requests\Vendor\ProductImagesRequest;
use DB;

class ProductController extends Controller
{
    public function index(){

        try{
            $products = auth()->guard('vendor')->user()->products()->orderBy('id')->paginate(50);
            return view('vendor.products.index', compact('products'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function create(){

        try{
            $data = [];
            $data['categories'] = Category::active()->select('id')->get();
            $data['tags'] = Tag::active()->select('id')->get();
            $data['brands'] = Brand::active()->select('id')->get();

            return view('vendor.products.create', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function store(GeneralProductRequest $request){

        try{
            // dd($request);
            //validation 
            DB::beginTransaction();

            // start create 
            $product = Product::create([
                'slug' => $request->slug,
                'brand_id' => $request->brand_id,
                'vendor_id' => auth()->user()->id
            ]);

            //save translations
            $product->name = $request->name;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->save();

            // save product categories
            $product->categories()->attach($request->categories);

            // save product tags
            if(isset($request->tags)){
                $product->tags()->attach($request->tags);
            }

            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function edit($id){

        try{
            $data = [];
            $data['categories'] = Category::active()->select('id')->get();
            $data['tags'] = Tag::active()->select('id')->get();
            $data['brands'] = Brand::active()->select('id')->get();

            $product = Product::findOrFail($id);
            return view('vendor.products.edit', compact('product'), $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function update(GeneralProductRequest $request, $id){

        try{
            //validation 
            DB::beginTransaction();

            // check if is exists in database
            $product = Product::findOrFail($id);

            // start update
            $product->slug = $request->slug;
            $product->brand_id = $request->brand_id;
            
            //save translations
            $product->translateOrNew('en')->name = $request->name;
            $product->translateOrNew('en')->description = $request->description;
            $product->translateOrNew('en')->short_description = $request->short_description;
            $product->save();

            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function show($id){

        try{
            $product = Product::findOrFail($id);
            return view('vendor.products.show', compact('product'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function price(ProductPriceRequest $request, $id){

        try{
            // dd($request);
            // validation
            // check id product exists in database
            $product = Product::findOrFail($id);
            
            // add price for product
            $product->price = $request->price;
            $product->special_price = $request->special_price;
            $product->special_price_start = $request->special_price_start;
            $product->special_price_end = $request->special_price_end;

            if($request->selling_price == !null){
                $product->selling_price = $request->selling_price;
            }
            $product->save();

            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function images(ProductImagesRequest $request, $id){

        try{
            // dd($request);
            // validation
            // check id product exists in database
            $product = Product::findOrFail($id);
            
            // save photo
            if ($request->hasFile('photo')) {
                $path = public_path();
                $destinationPath = $path . '/files/admin/images/products/'; // upload path
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                $photo->move($destinationPath, $name); // uploading file to given path
                $product->photo = 'files/admin/images/products/' . $name;
            }
            // save photos
            $images = array();
            if ($request->hasFile('photos')) {
                foreach ($files=$request->file('photos') as $file){
                    $path = public_path();
                    $destinationPath = $path . '/files/admin/images/products/'; // upload path
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
                    $file->move($destinationPath, $name); // uploading file to given path
                    $images[]= 'files/admin/images/products/' . $name;
                }
            }
            // dd($images);
            $product->update([   
                'photos'=>  implode(",", $images),
            ]);
            $product->save();

            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            // flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return $ex;
        }

    }

    public function stock(ProductStockRequest $request, $id){

        try{
            // validation
            // check id product exists in database
            $product = Product::findOrFail($id);
            
            // add stock for product
            $product->sku = $request->sku;
            $product->quantity = $request->quantity;
            $product->in_stock = $request->in_stock;
            $product->save();

            DB::commit();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function delete($id){

        try{
            $product = Product::findOrFail($id);
            if(!$product->photo == null){
                $image_path = public_path( $product->photo );
                if (unlink($image_path)){
                    $product->delete();
                    flash()->success("Successed");
                    return back();
                }
            }else{
                $product->delete();
                flash()->success("Successed");
                return back();
            }
            
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    // set ar language
    public function lang_ar(ProductLangRequest $request, $id)
    {
        try{
            // validation
            DB::beginTransaction();
            // check if exists
            $product = Product::findOrFail($id);
            // satrt create
            $product->translateOrNew('ar')->name = $request->name;
            $product->translateOrNew('ar')->description = $request->description;
            $product->translateOrNew('ar')->short_description = $request->short_description;
            $product->save();
            DB::commit();
            flash()->success("Successed , AR");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    // set es language
    public function lang_es(ProductLangRequest $request, $id)
    {
        try{
            // validation
            DB::beginTransaction();
            // check if exists
            $product = Product::findOrFail($id);
            // satrt create
            $product->translateOrNew('es')->name = $request->name;
            $product->translateOrNew('es')->description = $request->description;
            $product->translateOrNew('es')->short_description = $request->short_description;
            $product->save();
            DB::commit();
            flash()->success("Successed , ES");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back;
        }
    }

    public function deactivate($id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->update(['is_activate' => 0]);
            flash()->success("Successed Deactivate");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please contact Technical Suppoort");
            return back();
        }    

    }

    public function activate($id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->update(['is_activate' => 1]);
            flash()->success("Successed Activate");
            return back();
        }catch(\Excrption $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }    

    }

    public function unspecial($id){

        try{
            $product = Product::findOrFail($id);
            $product->update(['special_product' => 0]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

    public function special($id){

        try{
            $product = Product::findOrFail($id);
            $product->update(['special_product' => 1]);
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    
    }

}
