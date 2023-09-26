<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id' , 'desc')
        ->simplePaginate(5);
        return view('pages.products.index' , compact('products'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product  = Product::findOrFail($id);
        return view('pages.products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $product    = Product::find($id);
        $categories = Category::all();
    return view('pages.products.edit' , compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , int $id)
    {
        //Validate
            $request->validate([
                'title'              => 'required|string|max:255',
                'description'        => 'nullable|string|max:1020',
                'price'              => 'required|numeric',
                'available_quantity' => 'required|integer',
                'category_id'        => 'required|integer',
            ]);
            //Update Products
            $product_old = Product::find($id);
            $product     = Product::find($id);

            $product->title              = $request->title;
            $product->price              = $request->price;
            $product->description        = $request->description;
            $product->available_quantity = $request->available_quantity;
            $product->category_id        = $request->category_id;
            $product->save();

            if($product_old->title    != $product->title &&
            $product_old->price       == $product->price &&
            $product_old->description == $product->description){
                $message_title = "successful_product_title_updated";
                $message_body  = "The product ($product->id. $product->title) was successfully update from \"$product_old->title\".";
            }
            elseif(($product_old->description != $product->description &&
            $product_old->title  == $product->title)){
                $message_title = "successfully_category_description_updated";
                $message_body  = "The product ($product->id. $product->title) description was updated successfully.";
            }
            else{
                $message_title = "successful_product_update";
                $message_body  = "The product ($product->id. $product->title) All Attributes update was successfully";
            }
                return redirect()->route('products.index');
                // ->with($message_title, $message_body);
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        $product->updated_at = null;
        $product->save();
        return redirect('/products')
            ->with('deleted_product_message', "The product ($product->id. $product->title) has been deleted & moved to trash successfully deleted.");

    }

    public function delete()
    {
        $products = Product::orderBy('id','desc')->onlyTrashed()->paginate(5);
        $products_count = $products->count();
        return view('pages.products.delete', compact('products', 'products_count'));

    }

    public function restore($id)
    {
        // $product = Product::withTrashed()->find($id)->restore();
        $product = Product::withTrashed()->find($id);
        $product->restore();
        $product = Product::findOrFail($id);
        $product->updated_at = null;
        $product->save();
        return redirect()->route('products.index')
            ->with('restored_product_message', "The product ($product->id. $product->title) has been Restored successfully.");
    }

    public function forceDelete($id)
    {
        $forceDeleteProduct = Product::where('id', $id)->forceDelete();
        return redirect()->route('products.delete')
            ->with('permanent_deleted_product_message', "The product has been permanently deleted successfully.");
    }
}
