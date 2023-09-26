<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id' , 'desc')
        ->simplePaginate(4);
        return view('pages.categories.index' , compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if($category == null){
            return view('pages.categories.categories-404', compact('category'));
        }
        // $products = \App\Models\Product::where('category_id', $category->id)->simplePaginate(10);

        return view('pages.categories.products', compact('category'/*, 'products'*/));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        $category = Category::find($id);
        if($category == null){
            return view('pages.categories.categories-404', compact('category'));
        }
        return view('pages.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //Validate Category
        $request->validate([
            'title'       => 'required|unique:categories|max:255',
            'description' => 'nullable|max:1020',
        ]);

        //Update Category
        $category_old = Category::find($id);
        $category     = Category::find($id);

        $category->title       = $request->title;
        $category->description =$request->description;
        $category->save();

        if($category_old->title != $category->title &&
        $category_old->description == $category->description){
            $message_title = "successful_category_title_updated";
            $message_body  = "The Category ($category->id. $category_old->title) was successfully updated from \"$category_old->title\" to \"$category->title\".";
            return redirect('/categories')->with($message_title, $message_body);
        }
        elseif($category_old->description != $category->description &&
        $category_old->title == $category->title){
            $message_title = "successful_category_description_updated";
            $message_body  = "The Category ($category->id. $category->title) description was updated successfully.";
            return redirect('/categories')->with($message_title, $message_body);
        }
        elseif($category_old->description != $category->description &&
        $category_old->title != $category->title){
            $message_title = "successful_category_all_attributes_updated";
            $message_body  = "The Category ($category->id. $category_old->title) all attributes was updated successfully.";
            return redirect('/categories')->with($message_title, $message_body);
        }
        else{
            $message_title = "category_same_all_attributes";
            $message_body  = "The Category ($category->id. $category->title) all attributes' values remains the same values.";
            return redirect('/categories')->with($message_title, $message_body);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function clear($id)
    {
        // Method (1) -> poor practice
            // $category = Category::findOrFail($id);
            // $products = \App\Models\Product::where('category_id', $category->id)->get();
            // foreach($products as $product){
            //     $product->delete();
            // }

        // Method (2) -> good practice
            // $category = Category::findOrFail($id);
            // if($category->productCount() == 0){
            //     return back();
            // }
            // else{
            //     $category->product()->delete();
            // }

        // Method (3) -> best practice
            $category = Category::findOrFail($id);
            $category->product()->delete();

        return redirect('/categories')
            ->with('products_in_category_deleted_successfully', "All the products for category ($category->title) were successfully deleted!");
    }

    public function destroy($id)
    {
        // Method (1) -> poor practice
            // $category = Category::findOrFail($id);
            // $products = \App\Models\Product::where('category_id', $category->id)->get();
            // foreach($products as $product){
            //     $product->delete();
            // }
            // $category->delete();

        // Method (2) -> good practice
            // $category = Category::findOrFail($id);
            // $category->product()->delete();
            // $category->delete();

        // Method (3) -> best practice (in this case when the category is deleted, then its all products will be deleted because of the delete on cascade in products migration)
            $category = Category::findOrFail($id);
            $category->delete();

        return redirect('/categories')
            ->with('category_deleted_successfully', "The category ($category->id. $category->title) and its products were successfully deleted!");
    }
}
