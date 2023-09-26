@extends('layouts.master')
@section('title', "$product->title")
<style>
.single-product{
    padding-top: 5%;
}
</style>
@section('main')
<div class="container text-center my-3 mb-2 single-product">
    <div class="bg-dark text-light w-75 mx-auto
        shadow rounded p-5">
        <h2> {{$product->title ?? 'NULL'}}</h2>
        <div class="alert alert-light">
            product Price <span class="badge bg-success">
                {{$product->price ?? 'NULL'}}</span>
            </div>
        <p>
            {{$product->description ?? 'NULL'}}
        </p>
        <hr>
        <div class="">
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success mx-1"><i class="fa-solid fa-edit p-1"></i> Edit</a>
                <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i> Delete</button>
                <p class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left p-1"></i> Return to Products</a>
                    <a href="{{ route('categories.show', $product->category->id) }}" class="btn btn-warning"><i class="fa-solid fa-network-wired p-1"></i> Show Related Products</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

