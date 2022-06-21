<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }


    public function store(Request $request)
    {
        Product::create(array_merge($request->all(), ['reference' => generateRandomString(16)]));
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
