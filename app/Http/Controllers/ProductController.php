<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //Index function (list all products)
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->where('published', true)->paginate(6);
//        $sizes = ProductSize::get();
//        dd($sizes);
//        $sizes = DB::table('product_size')->get()->toArray();
//        $sizesValue = DB::table('sizes')->get();
        return view('products.index', compact('products'));
    }
    //Show products by category
    public function category($id)
    {
        Category::findOrFail($id);
        $products = Product::orderBy('created_at', 'desc')->where('published', true)->where('category_id',$id)->paginate(6);
        return view('products.index', compact('products'));
    }
    //Show Discounted product
    public function discount()
    {
        $products = Product::orderBy('created_at', 'desc')->where('status', 'solded')->paginate(6);
        return view('products.index', compact('products'));
    }

    //Show function (single product)

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
