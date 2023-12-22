<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories=Sub_Category::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }

    public function addSubCategory(){
        $categories=Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    public function storeSubCategory(Request $request){
        $validated = $request->validate([
            // 'sub_category' => 'required|unique:sub__categories',
            'category_id' => 'required',
        ]);

        $SubCategory=Sub_Category::where('id')->value('sub_category_name');
        if($request->subCategory===$SubCategory){
            return redirect()->route('admin.editSubCategory')->with('message','This Sub Category Already Added');
        }else{
            $category_id=$request->category_id;
            $category_name=Category::where('id',$category_id)->value('Category_Name');

            $subCategory=new Sub_Category();
            $subCategory->sub_category_name=$request->subCategory;
            $subCategory->slug=Str::lower(Str::slug($request->sub_category));
            $subCategory->Category_id = $request->category_id;
            $subCategory->category_name=$category_name;
            $subCategory->save();
            Category::find($category_id)->increment('Count_Sub_Category',1);
            return redirect()->route('admin.allsubcategory')->with('message','Sub Category Added Successfully');
        }
    }

    public function editSubCategory($id){
        $sub_category=Sub_Category::find($id);
        $categories=Category::all();
        return view('admin.subcategory.edit',compact('sub_category','categories'));
    }

    public function updateSubCategory(Request $request,$id){
        $validated = $request->validate([
            'sub_category' => 'required',
        ]);

        $category_id=$request->category_id;
        $category_name=Category::where('id',$category_id)->value('Category_Name');

        $subCategory=Sub_Category::find($id);
        $subCategory->sub_category_name=$request->subCategory;
        $subCategory->slug=Str::lower(Str::slug($request->sub_category));
        $subCategory->Category_id = $request->category_id;
        $subCategory->category_name=$category_name;
        $subCategory->save();
        return redirect()->route('admin.allsubcategory')->with('message','Sub Category Edited Successfully');
    }

    public function deleteSubCategory($id){
        $category_id=Sub_Category::where('id',$id)->value('Category_id');
        Sub_Category::find($id)->delete();
        Category::where('id',$category_id)->decrement('Count_Sub_Category', 1);
        return redirect()->route('admin.allsubcategory')->with('message','Sub Category Deleted Successfully');
    }
}
