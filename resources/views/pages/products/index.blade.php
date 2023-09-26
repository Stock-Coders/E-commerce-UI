@extends('layouts.master')
@section('title', 'Products')
@section('main')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3"><u>All Products ({{ $products->count() }})</u></h1><br/>
        <p>
            @if(session()->has('deleted_product_message'))
                <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
                    {{ session()->get('deleted_product_message') }} <a href="{{ route('products.delete') }}">Check Trashed Products</a>
                </div>
            @elseif(session()->has('restored_product_message'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('restored_product_message') }}
                </div>
            @endif
        </p>
        @foreach ($products as $product)
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
                        <form action="{{  route('products.destroy',$product->id)  }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{'/products/' . $product->id }}" class="btn btn-primary border-2 border-dark"><i class="fa-solid fa-eye p-1"></i> Show</a>
                            <a href="{{  route('products.edit',$product->id)  }}" class="btn btn-success border-2 border-dark"><i class="fas fa-edit p-1"></i> Edit</a>
                            <button class="btn btn-danger border-2 border-dark" type="submit"><i class="fas fa-trash-alt p-1"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="my-4">
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection

