<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.products.create',compact('sizes','categories'));
    }

    public function update(Request $request, Product $product)
    {

        $sizes = $request->all()['sizes'];
//        $entries = array_merge($request->all(), ['reference' => generateRandomString(16)]);
//        unset($entries['sizes']);
//

//        Delete all sizes related to product
        DB::table('product_size')->where('product_id', $product->id)->delete();

        foreach ($sizes as $size){
            DB::table('product_size')->insert([
                'product_id' => $product->id,
                'size_id' => $size
            ]);
        }

        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product','sizes','categories'));
    }


    public function store(Request $request)
    {
//        foreach ($request->all()['sizes'] as $size){
//
//        }
        $sizes = $request->all()['sizes'];
        $entries = array_merge($request->all(), ['reference' => generateRandomString(16)]);
        unset($entries['sizes']);
        $product = Product::create($entries)->id;

        foreach ($sizes as $size){
            DB::table('product_size')->insert([
                'product_id' => $product,
                'size_id' => $size
            ]);
        }
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
