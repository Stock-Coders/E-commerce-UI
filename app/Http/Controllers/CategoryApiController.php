<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
    //get All Category Api
    public function getCategories(){
        $categories = Category::all();
        return response()->json($categories);
    }

    //save New Category
    public function storeCategory(Request $request){
        //Validate Category Api
        $request->validate([
            'title'       => 'required|unique:categories|max:255',
            'description' => 'nullable|max:1020',
        ]);
        $category = Category::create($request->all());
        return response()->json($category);
    }

    //update Category Api
    public function updateCategory(Request $request , $id){
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json($category);
    }

    //delete Category Api
    public function deleteCategory($id){
        $deleteCategory = Category::destroy($id);
        return response()->json($deleteCategory);
    }

}
