<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function addCategory(){
        return view('admin.category.create');
    }

    public function storeCategory(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        $category=new Category();
        $category->Category_Name=$request->category_name;
        $category->Slug=Str::lower(str_replace(' ','-',$request->category_name));
        $category->save();
        return redirect()->route('admin.allcategory')->with('message','Category Added Successfully');
    }

    public function editCategory($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        $category=Category::find($id);
        $category->Category_Name=$request->category_name;
        $category->save();
        return redirect()->route('admin.allcategory')->with('message','Category Updated Successfully');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->route('admin.allcategory')->with('message','Category Deleted Successfully');
    }
}
