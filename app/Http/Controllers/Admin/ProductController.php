<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $products = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/products/',$filename);
            $products->image= $filename;
        }
        $products-> cate_id = $request-> input('cate_id');
        $products-> name = $request-> input('name');
        // $products-> small_description = $request-> input('small_description');
        //small_description
        $products-> description = $request-> input('description');
        //description
        $products-> original_price = $request-> input('original_price');
        $products-> selling_price = $request-> input('selling_price');
        $products-> tax = $request-> input('tax');
        $products-> qty = $request-> input('qty');
        $products-> status = $request-> input('status')== TRUE?'1':'0';
        $products-> trending = $request-> input('trending')== TRUE?'1':'0';
        // $products-> meta_title = $request-> input('meta_title');
        // $products-> meta_keywords = $request-> input('meta_keywords');
        // $products-> meta_description = $request-> input('meta_description');
        $products-> save();
        return redirect()->route('admin.products')-> with('status',"product added successfully");

    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if($request-> hasFile('image'))
        {
            $path= 'assets/uploads/products/'.$products-> image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/products/',$filename);
            $products->image= $filename;
        }

        $products-> name = $request-> input('name');
        $products-> small_description = $request-> input('small_description');
        $products-> description = $request-> input('description');
        $products-> original_price = $request-> input('original_price');
        $products-> selling_price = $request-> input('selling_price');
        $products-> tax = $request-> input('tax');
        $products-> qty = $request-> input('qty');
        $products-> status = $request-> input('status')== TRUE?'1':'0';
        $products-> trending = $request-> input('trending')== TRUE?'1':'0';
        $products-> meta_title = $request-> input('meta_title');
        $products-> meta_keywords = $request-> input('meta_keywords');
        $products-> meta_description = $request-> input('meta_description');
        $products-> update();

        return redirect()->route('admin.products')-> with('status',"Product Updated Successfully");
    }
    public function destroy($id)
    {
        $products= Product::find($id);
        $path= 'assets/uploads/products/'.$products-> image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $products->delete();
            return redirect()->route('admin.products')-> with('status',"Product deleted Successfully");

}
}
