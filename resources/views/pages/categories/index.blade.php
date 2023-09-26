@extends('layouts.master')
@section('title', 'Categories')
@section('main')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3"><u>All Categories ({{ $categories->count() }})</u></h1><br/>
        <p>
            {{-- start => Same Category Attributes --}}
            @if(session()->has('category_same_all_attributes'))
                <div class="alert alert-warning text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('category_same_all_attributes') }}
                </div>
            {{-- end => Same Category Attributes --}}
            {{-- start => Update Category --}}
            @elseif(session()->has('successful_category_title_updated'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('successful_category_title_updated') }}
                </div>
            @elseif(session()->has('successful_category_description_updated'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('successful_category_description_updated') }}
                </div>
            @elseif(session()->has('successful_category_all_attributes_updated'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('successful_category_all_attributes_updated') }}
                </div>
            {{-- end => Update Category --}}
            {{-- start => Clear Category's Products --}}
            @elseif(session()->has('products_in_category_deleted_successfully'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('products_in_category_deleted_successfully') }}
                </div>
            {{-- end => Clear Category's Products --}}
            {{-- start => Delete Category --}}
            @elseif(session()->has('category_deleted_successfully'))
                <div class="alert alert-success text-center mx-auto" style="width: 55%; margin-top: 3%;">
                    {{ session()->get('category_deleted_successfully') }}
                </div>
            {{-- end => Delete Category --}}
            @endif
        </p>
        @foreach ($categories as $category)
            <div class="my-2 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            ID: {{$category->id}} <br> {{$category->title}}
                        </h5>
                      <p class="card-text">
                        {{$category->description ?? 'NULL'}}
                        <hr>
                        Created At: {{$category->created_at}}
                        </p>
                        <div class="d-flex justify-content-center align-items-center text-center">
                            <form action="{{ route('categories.destroy',$category->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-success btn-md p-1 border-2 border-dark text-white"><i class="fas fa-edit p-1"></i> Edit</a>
                                <button class="btn btn-danger btn-md p-1 border-2 border-dark text-white" onclick="return confirm('Are you sure that you want to delete - {{ $category->title }}?');" type="submit" title="{{'Delete '."- ($category->title)"}}"><i class="fa-solid fa-trash-alt p-1"></i> Delete </button>
                            </form>
                            @if($category->productCount() != 0)
                                <form action="{{ route('categories.clear', $category->id)}}" method="post" class="p-1">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-secondary btn-md p-1 border-2 border-dark text-white" onclick="return confirm('Are you sure that you want to delete all the products within - {{ $category->title }}?');" type="submit"><i class="fa-solid fa-broom p-1"></i> Clear Products</button>
                                </form>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-md p-1 text-dark border-2 border-dark"><i class="far fa-clone p-1"></i> Show Products</a>
                            @endif
                        </div>
                    </div>
                    </div>
            </div>
        @endforeach
        <div class="my-4">
            {{$categories->links()}}
        </div>
    </div>
</div>
@endsection

