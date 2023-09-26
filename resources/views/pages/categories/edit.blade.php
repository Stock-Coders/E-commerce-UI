@extends('layouts.master')
@section('main')
<section class="my-5 container text-center">
    <h2 class="w-50 mx-auto p-3 bg-light shadow">Update Category</h2>
    <div class="row mx-auto w-50">
        <form action="{{'/categories/' . $category->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group my-3">
                <label class="d-flex flex-start" for="id">ID</label>
                <input type="text" class="form-control" value="{{$category->id}}" disabled>
            </div>

            <div class="form-group my-3">
                <label class="d-flex flex-start" for="title">Title <span class="text-danger">*</span></label>
                <input type="text"name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                value="{{$category->title}}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group my-3">
                <label class="d-flex flex-start" for="description">Description</label>
                <textarea name="description"  style="height: 200px" id="description"  class="form-control @error('description') is-invalid @enderror">
                {{$category->description}}
                </textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <input type="submit"value="Update Category" class="btn btn-success mt-3">
        </form>
    </div>
</section>
@endsection
