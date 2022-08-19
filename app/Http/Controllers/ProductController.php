<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('dashboard.admin.product.index')->with([ 'products' => $products, 'i' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::latest()->get();
        return view('dashboard.admin.product.create')->with([ 'categories'=> $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:products,title'],
            'category_id' => [ 'required', 'integer','gt:0', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'price' => ['required', 'gt:0', 'min:1','max:99999.99',],
            'discount' => ['nullable', 'integer', 'gt:0', 'between:1,100'],
            'image' => ['nullable','image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'status' => ['nullable','boolean']
        ]);

        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        
        $thumbnailPathTable = public_path('storage/images/product/thumbnail_table/');
        $thumbnailPath = public_path('storage/images/product/thumbnail/');
        $originalPath = public_path('storage/images/product/images/');

        $img_generated_path = time().'_'.$originalImage->getClientOriginalName();

        $thumbnailImage->resize(600,700)->save($originalPath.$img_generated_path);
        $thumbnailImage->resize(400,300)->save($thumbnailPath.$img_generated_path);
        $thumbnailImage->resize(70,70)->save($thumbnailPathTable.$img_generated_path);  
                
        $data['image'] = $img_generated_path;
        Product::create($data);
         
        return redirect()->route('products.index')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $cart = Cart::content();
        $related_products = Product::where('category_id', $product->category_id)->latest()->limit(5)->get();
        return view('dashboard.admin.product.show')->with([ 'product' => $product, 'related_products' => $related_products, 'cart' => $cart ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('dashboard.admin.product.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:products,title,'.$product->id],
            'category_id' => [ 'required', 'integer','gt:0', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'price' => ['required', 'gt:0', 'min:1','max:99999.99',],
            'discount' => ['nullable', 'integer', 'gt:0', 'between:1,100'],
            'image' => ['nullable','image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'status' => ['nullable','boolean']
        ]);


        if ($request->hasFile('image')) {

            $thumbnailPathTable = public_path('storage/images/product/thumbnail_table/');
            $thumbnailPath = public_path('storage/images/product/thumbnail/');
            $originalPath = public_path('storage/images/product/images/');

            $old_img = $originalPath.$product->image;
            $old_thumb = $thumbnailPath.$product->image;
            $old_thumb_table = $thumbnailPathTable.$product->image;

            if(File::exists($old_img) && File::exists($old_thumb) && File::exists($old_thumb_table)){

                File::delete([$old_img, $old_thumb, $old_thumb_table]);
            }

            $originalImage = $request->file('image');
            $thumbnailImage = Image::make($originalImage);

            $img_generated_path = time().'_'.$originalImage->getClientOriginalName();

            $thumbnailImage->resize(600,700)->save($originalPath.$img_generated_path);
            $thumbnailImage->resize(400,300)->save($thumbnailPath.$img_generated_path);
            $thumbnailImage->resize(70,70)->save($thumbnailPathTable.$img_generated_path);  
                    
            $data['image'] = $img_generated_path;
            $data['status'] = $request->has('status');
            $product->update($data);

            return redirect()->route('products.index')->with('message', 'Successfully updated');

        }else{
            $data['status'] = $request->has('status');
            $product->update($data);
            return redirect()->route('products.index')->with('message', 'Successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $thumbnailPathTable = public_path('storage/images/product/thumbnail_table/');
        $thumbnailPath = public_path('storage/images/product/thumbnail/');
        $originalPath = public_path('storage/images/product/images/');

        $old_img = $originalPath.$product->image;
        $old_thumb = $thumbnailPath.$product->image;
        $old_thumb_table = $thumbnailPathTable.$product->image;

        if(File::exists($old_img) && File::exists($old_thumb) && File::exists($old_thumb_table)){

            File::delete([$old_img, $old_thumb, $old_thumb_table]);
        }

        $product->delete();
        
        return redirect()->route('products.index')->with('message', 'Successfully deleted');
    }
}
