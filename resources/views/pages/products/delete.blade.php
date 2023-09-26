@extends('layouts.master')
@section('title', 'Deleted Products')
@section('main')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3"><u>All Deleted Products ({{ $products->count() }})</u></h1><br/>
        <p>
            @if(session()->has('permanent_deleted_product_message'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('permanent_deleted_product_message') }}
                </div>
            @endif
        </p>
        @forelse ($products as $product)
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
                      {{-- <a href="{{'/products/' . $product->id }}"
                        class="btn btn-primary">show</a> --}}

                      {{-- <a href="#" class="btn btn-success">Restore</a>
                      <a href="#" class="btn btn-danger">Permanent Delete</a> --}}

                      <div class="d-flex justify-content-center align-items-center text-center">
                        <form action="{{ route('products.restore', $product->id) }}" method="get" class="p-1">
                            <button class="btn btn-success border-2 border-dark btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to restore the product within ('.$product->title.')?');" type="submit"><i class="fas fa-trash-restore-alt p-1"></i> Restore</button>
                        </form>
                        <form action="{{ route('products.forceDelete', $product->id) }}" method="post" class="p-1">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger border-2 border-dark btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete the product ('.$product->title.')?');" type="submit"><i class="fa-solid fa-ban p-1"></i> Permanent Delete</button>
                        </form>
                    </div>
                    </div>
                  </div>
            </div>
            @empty
            <div class="container mt-lg-4 d-flex justify-content-center text-center w-100">
                <span class="alert alert-danger p-2 rounded text-dark">The trash is empty. There are no deleted products.</span>
            </div>
        @endforelse
        <div class="my-4">
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection

