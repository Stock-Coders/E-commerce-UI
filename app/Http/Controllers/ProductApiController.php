<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    //get All Products Api
    public function getProducts(){
        $products = Product::all();
        return response()->json($products);
    }

    //get All Deleted Products Api
    public function getDeletedProducts(){
        $AllDeletedProducts = Product::onlyTrashed()->get();
        return response()->json($AllDeletedProducts);
    }

    //get Single Product
    public function getProduct($id){
        $singleProduct = Product::find($id);
        return response()->json($singleProduct);
    }

    //save New Product
    public function storeProduct(Request $request){
        //Validate Product Api
        $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string|max:1020',
            'price'              => 'required|numeric',
            'available_quantity' => 'required|integer',
            'category_id'        => 'required|integer',
        ]);
        $product = Product::create($request->all());
        return response()->json($product);
    }

    //update Product Api
    public function updateProduct(Request $request , $id){
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json($product);
    }

    //delete Product Api
    public function deleteProduct($id){
        $deleteProduct = Product::findOrFail($id);
        $deleteProduct->delete();
        $deleteProduct->updated_at = null;
        $deleteProduct->save();
        return response()->json($deleteProduct);
    }

    //restore Product Api
    public function restoreProduct($id){
        // $restoreProduct = Product::withTrashed()->find($id)->restore();
        $restoreProduct = Product::withTrashed()->find($id);
        $restoreProduct->restore();
        $restoreProduct->updated_at = null;
        $restoreProduct->save();
        return response()->json($restoreProduct);
    }

    //forceDelete Product Api
    public function forceDeleteProduct($id){
        $forceDeleteProduct = Product::where('id', $id)->whereNotNull('deleted_at');
        if($forceDeleteProduct){
            $forceDeleteProduct->forceDelete();
            return response()->json($forceDeleteProduct);
        }
        else{
            return response()->json();
        }
    }

}

