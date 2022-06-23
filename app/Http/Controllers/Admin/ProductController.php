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

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.products.create', compact('sizes', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
//        Formulaire validation

        $sizes = $request->all()['sizes'];
//        $entries = array_merge($request->all(), ['reference' => generateRandomString(16)]);
//        unset($entries['sizes']);
//

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

    public function edit(Product $product)
    {
        $sizes = Size::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'sizes', 'categories'));
    }


    public function store(Request $request)
    {

//        [
//      "_token" => "loF16YpRiFwCc2YYt0crR1CBr3XxLE4pQPud6rnf"
//      "name" => "gdfsgdf"
//      "description" => "gfdgdfsgdfgfd"
//      "price" => "100"
//      "sizes" => array:1 [
//        0 => "2"
//      ]
//      "status" => "standard"
//      "category_id" => "2"
//      "published" => "1"
//    ]
        dd($request);

        $request->validate([
            "name" => "required",
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

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
