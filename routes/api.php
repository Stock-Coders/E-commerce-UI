<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\ProductApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//-----> CategoryApiController Controller
//get All Categories (index)
Route::get('/categories', [CategoryApiController::class ,'getCategories'] );
//save New Api Category (store)
Route::post('/categories' , [CategoryApiController::class , 'storeCategory']);
//update Category Api (update)
Route::put('/categories/{id}',[CategoryApiController::class,'updateCategory']);
//delete Category Api (destroy)
Route::delete('/categories/{id}', [CategoryApiController::class , 'deleteCategory']);
//--------------------------------------------------------------------------------------------------------//
//-----> ProductApiController Controller
//get All Products (index)
Route::get('/products', [ProductApiController::class ,'getProducts'] );
//get All Deleted Products (delete)
Route::get('/product/delete', [ProductApiController::class ,'getDeletedProducts'] );
//get Single Product (show)
Route::get('/products/{id}' , [ProductApiController::class , 'getProduct']);
//save New Api Product (store)
Route::post('/products' , [ProductApiController::class , 'storeProduct']);
//update Product Api
Route::put('/products/{id}',[ProductApiController::class,'updateProduct']);
//delete  Product Api
Route::delete('/products/{id}', [ProductApiController::class , 'deleteProduct']);
//restore  Product Api (restore)
Route::get('/product/restore/{id}', [ProductApiController::class , 'restoreProduct']);
//force or permanent delete Product Api (forceDelete)
Route::any('/product/forceDelete/{id}', [ProductApiController::class , 'forceDeleteProduct']);
//--------------------------------------------------------------------------------------------------------//
//-----> RatingApiController Controller
//get All Ratings (index)
Route::get('/ratings', [RatingApiController::class ,'getRatings']);
Route::delete('/ratings/{id}', [RatingApiController::class ,'deleteRatings']);
//--------------------------------------------------------------------------------------------------------//
//-----> ContactApiController Controller
//get All Contact (index)
