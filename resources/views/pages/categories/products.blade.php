@extends('layouts.master')
@section('title', "$category->title's Products")
@section('main')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3"><u>All "<span class='text-primary'>{{ "".$category->title."'s" }}</span>" Products ({{ $category->product->count() }})</u></h1><br/>
        @forelse ($category->product as $product)
            <div class="my-2 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <h5 class="card-header shadow"> Price is {{$product->price}}</h5>
                    <div class="card-body">
                        <h5 class="card-title">
                            ID: {{$product->id}} <br> {{$product->title}}
                        </h5>
                        <p class="card-text">
                            {{$product->description ?? 'NULL'}}
                            <hr>
                            Created At: {{$product->created_at}}
                        </p>
                        <div class="d-flex justify-content-center align-items-center">
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{'/products/' . $product->id }}" class="btn btn-primary border-2 border-dark"><i class="fa-solid fa-eye p-1"></i> Show</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success border-2 border-dark"><i class="fa-solid fa-edit p-1"></i> Edit</a>
                                <button class="btn btn-danger border-2 border-dark" type="submit"><i class="fa-solid fa-trash-alt p-1"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                  </div>
            </div>
        @empty
            <div class="container mt-lg-4 d-flex justify-content-center text-center w-100">
                <span class="alert alert-danger p-2 rounded text-dark">There are no products in this category yet.</span>
            </div>
        @endforelse
        {{-- <div class="my-4">
            {{$category->product->links()}}
        </div> --}}
    </div>
</div>
@endsection

