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
        $products = Product::orderBy('created_at', 'desc')->where('published', true)->where('category_id', '!=', 'null');
        $paginatedProducts = $products->paginate(6);

        return view('products.index', [
            'products' => $paginatedProducts,
            'nbProducts' => $products->count(),
            'bodyclass' => "home-template",
        ]);
    }

    //Show products by category
    public function category($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::orderBy('created_at', 'desc')->where('published', true)->where('category_id', $id);
        $paginatedProducts = $products->paginate(6);
        return view('products.category', [
            'products' => $paginatedProducts,
            'nbProducts' => $products->count(),
            'category' => $category
        ]);
    }

    //Show Discounted product
    public function discount()
    {
        $products = Product::orderBy('created_at', 'desc')->where('published', true)->where('category_id', '!=', 'null')->where('status', 'solded');
        $paginatedProducts = $products->paginate(6);
        return view('products.index', [
            'products' => $paginatedProducts,
            'nbProducts' => $products->count(),
        ]);
    }

    //Show function (single product)
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
