<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;




class ProductController extends Controller
{

    public function index()
    {

        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        return view('products.index', $data);
    }


    public function create()
    {
        $data['categories'] = Category::all();
        return view('products.create', $data);
    }


    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->is_active = $request->is_active ? 1 : 0;
          

        if($request->hasfile('image')){

            $file =$request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file ->move('uploads/products' ,$filename);
            $product->image =$filename;
        }

        $product->save();

        return redirect()->route('products.index')->with('status','Product has been Created Successfully !');

    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['categories'] = Category::all();
        return view('products.edit', $data);
    }

    public function update(Request $request, Product $product)
    {
         $product->name = $request->name;
         $product->category_id = $request->category_id;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->is_active = $request->is_active ? 1 : 0;

         if ($request->hasFile('image')) {

            $file =$request->file('image');

            $extension = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file ->move('uploads/products/', $filename);

            if ($product->image !== NULL) {
                if (file_exists(public_path('uploads/products/'. $product->image ))) {
                    unlink(public_path('uploads/products/'. $product->image ));
                }
            }

             $product->image = $filename ;
         }

         $product->update();

         return redirect()->route('products.index')->with('status','Product has been Updated Successfully !');

    }

    public function destroy(Product $product)
    {
        $destination ='uploads/products'.$product->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
        //delete the product
        $product->delete();

        //redirect the user with a success message
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

    public function changeStatus(Product $product)
    {
        $product->is_active = !$product->is_active;
        $product->update();
        return redirect()->route('products.index')->with('status','Product active status has been changed successfully !');
    }
}
