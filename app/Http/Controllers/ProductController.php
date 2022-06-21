<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Index function (list all products)
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->where('published', true)->paginate(6);
        return view('products.index', compact('products'));
    }

    //Show function (single product)

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }
}
