<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    //INDEX OF ADMIN SIDE PRODUCTS
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index', compact('products'));
    }

    //CREATE VIEW OF ADMIN SIDE PRODUCTS
    public function create()
    {
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.products.create', compact('sizes', 'categories'));
    }

    //EDIT VIEW OF ADMIN SIDE PRODUCTS
    public function edit(Product $product)
    {
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'sizes', 'categories'));
    }


    //UPDATE FUNCTION FOR CRUD DATA
    public function update(Request $request, Product $product)
    {
//        Formulaire validation

        $request->validate([
            "name" => ['required', 'min:5', 'max:100'],
            "description" => "required",
            "price" => "required",
            "sizes" => "required",
            "status" => "required",
            "category_id" => "required",
            "published" => "required",
        ]);

        $sizes = $request->all()['sizes'];
//        Delete all sizes related to product
        DB::table('product_size')->where('product_id', $product->id)->delete();

        //Retrieve categoryID  &  category
        $categoryId = $request->all()['category_id'];
        $category = DB::table('categories')->where('id', $categoryId)->first();
        if (!empty($request->image)) {

            $filename = time() . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs(
                $category->name,
                $filename,
                'public'
            );
            //        Delete picture related to product
            DB::table('pictures')->where('product_id', $product->id)->delete();


            //Create Picture
            Picture::create(array(
                'image' => $path,
                'product_id' => $product->id
            ));
        }


        foreach ($sizes as $size) {
            DB::table('product_size')->insert([
                'product_id' => $product->id,
                'size_id' => $size
            ]);
        }

        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    //STORE FUNCTION FOR CRUD DATA
    public function store(Request $request)
    {

        $request->validate([
            "name" => ['required', 'min:5', 'max:100'],
            "description" => "required",
            "price" => "required",
            "sizes" => "required",
            "status" => "required",
            "category_id" => "required",
            "published" => "required",
        ]);
        //Retrieve categoryID  &  category
        $categoryId = $request->all()['category_id'];
        $category = DB::table('categories')->where('id', $categoryId)->first();

        $filename = time() . '.' . $request->image->extension();
        $path = $request->file('image')->storeAs(
            $category->name,
            $filename,
            'public'
        );

        $sizes = $request->all()['sizes'];
        $entries = array_merge($request->all(), ['reference' => generateRandomString(16)]);
        unset($entries['sizes']);

//        Create Product
        $product = Product::create($entries);


//        Insert new sizes
        foreach ($sizes as $size) {
            DB::table('product_size')->insert([
                'product_id' => $product->id,
                'size_id' => $size
            ]);
        }

        //Create Picture
        Picture::create(array(
            'image' => $path,
            'product_id' => $product->id
        ));

        return redirect()->route('admin.products.index');
    }

    //DESTROY FUNCTION FOR CRUD DATA
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
