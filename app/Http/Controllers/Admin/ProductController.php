<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\NullableType;

use function Pest\Laravel\delete;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function addProduct(){
        $category=Category::all();
        $subCategory=Sub_Category::all();
        return view('admin.product.create',compact('category','subCategory'));
    }

    public function storeProduct(Request $request){
        $validated = $request->validate([
            'sub_category' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'product_description' => 'required',
            'product_short_des' => 'required',
            'product_price' => 'required',
            'Category' => 'required',
            'sub_category' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $Category=$request->Category;
        $sub_category=$request->sub_category;

        $category_name=Category::where('id',$Category)->value('Category_Name');
        $sub_category_name=Sub_Category::where('id',$sub_category)->value('sub_category_name');

        $image=$request->file('product_img');
        $img=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('uploads'),$img);
        $img_url='uploads/'.$img;

        $product=new Product();
        $product->product_name=$request->product_name;
        $product->quantity=$request->quantity;
        $product->short_description=$request->product_short_des;
        $product->description=$request->product_description;
        $product->price=$request->product_price;
        $product->product_category_name=$category_name;
        $product->product_sub_category_name=$sub_category_name;
        $product->product_category_id=$request->Category;
        $product->product_sub_category_id=$request->sub_category;
        $product->product_image=$img_url;
        $product->slug=Str::lower(Str::slug($request->product_name));
        $product->save();
        Category::find($Category)->increment('Count_Products',1);
        Sub_Category::find($sub_category)->increment('product_count',1);
        return redirect()->route('admin.allproduct')->with('message','Product Added Successfully');
    }

    public function editProduct(Request $request, $id){
        $products=Product::find($id);
        return view('admin.product.edit',compact('products'));
    }

    public function updateProduct(Request $request , $id){



        $product=Product::find($id);

        if($request->hasFile('product_img')){
            $image=$request->file('product_img');
            $img=hexdec(uniqid()).'.'.$image->getClientOriginalExtension(Null);
            $request->product_img->move(public_path('uploads'),$img);
            $img_url='uploads/'.$img;
            $product->product_image=$img_url;
        }

        $product->product_name=$request->product_name;
        $product->quantity=$request->quantity;
        $product->short_description=$request->product_short_des;
        $product->description=$request->product_description;
        $product->price=$request->product_price;

        $product->slug=Str::lower(Str::slug($request->product_name));
        $product->save();
        return redirect()->route('admin.allproduct')->with('message','Product Added Successfully');
    }

    public function deleteProduct( $id){
        $category_id=Product::where('id',$id)->value('product_category_id');
        $sub_category_id=Product::where('id',$id)->value('product_sub_category_id');
        Product::find($id)->delete();
        Category::where('id',$category_id)->decrement('Count_Products', 1);
        Sub_Category::where('id',$sub_category_id)->decrement('product_count', 1);
        return redirect()->route('admin.allproduct')->with('message','Product Added Successfully');

    }
}
