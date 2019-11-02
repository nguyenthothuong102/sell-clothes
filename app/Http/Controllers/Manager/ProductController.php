<?php

namespace App\Http\Controllers\Manager;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Image;
use App\Category;
use App\ProductSize;
use Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(10);
       // $products=Product::all();
        return view('manager.products.index', ['products' => $products]);
    }

    public function detailProductId(Product $product)
    {
       //dd($product);
       //dd($product->productSize);
        $productSize = $product->productSizes;
        // dd($productSize->pluck('size')->toArray());
        // dd($productSize->sum('quantity'));
        $images = $product->images;
        //dd($images);

        return view('manager.products.detail',compact('productSize','images','product'));
    }

    public function createProductSize(Product $product){
        return view('manager.products.add', compact('product'));
    }

    public function storeProductSize(Product $product, ProductRequest $request)
    {
        $product->productSizes()->create($request->only(['size', 'quantity']));

        return redirect()->route('manager.products.index');
    }

    public function addStore(Product $product){


        return view('manager.products.addStore', compact('product'));
    }

    public function edit($id){
        $categories = Category::where('parent_id', '!=', null);
        $product    = Product::find($id);
        return view('manager.products.edit', compact('categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->except('_token','_method');
        $product->update($data);

        Session::flash('success','Cập nhật thành công!');

        return redirect()->route('manager.products.index');
    }

    public function create()
    {
        $categories = Category::where('parent_id', '!=', null)->pluck('name', 'id');
        return view('manager.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $faker = \Faker\Factory::create();

        $data_product = [
            'code'        => $faker->isbn13,
            'name'        => $request->name_product,
            'brand'        => $request->brand_product,
            'description' => $request->description,
            'price'       => $request->price,
            'category_id' => $request->category_id,
        ];
        // dd($data_product);
        $product_id = Product::create($data_product)->id;

        $data_product_detail = [
            'size'         => $request->size,
            'quantity' => $request->quantity,
            'product_id'     => $product_id,
        ];

        ProductSize::create($data_product_detail);

        $images = $request->images;



         if ($request->hasFile('images')) {
            foreach ($images as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/', $name);

                $data_product_image = [
                'name'       => $request->name_image,
                'path'      => '/uploads/' . $name,
                'product_id' => $product_id,
                ];
                Image::create($data_product_image);
            }
          }

         Session::flash('success','Tạo mới thành công!');
         return redirect()->route('manager.products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Xóa thành công!');
    }
}
