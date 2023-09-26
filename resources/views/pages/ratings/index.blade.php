@extends('layouts.master')
@section('title', 'Ratings')
@section('main')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3"><u>All Products Ratings ({{ $ratings->count() }})</u></h1><br/>
        <p>
            @if(session()->has('rating_deleted_successfully'))
                <div class="alert alert-success text-center mx-auto" style="width: 80%; margin-top: 3%;">
                    {{ session()->get('rating_deleted_successfully') }}
                </div>
            @endif
        </p>
        @foreach ($ratings as $rating)
            <div class="my-2 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    {{-- <h5 class="card-header shadow"> {{$rating->id}}</h5> --}}
                    <div class="card-body">
                    <h5 class="card-title">
                        ID: {{$rating->id}} <br>
                        Rating Level:
                        @if($rating->rating_level == 1)
                            <span class="text-danger">{{ "Poor" }}</span>
                        @elseif($rating->rating_level == 2)
                            <span class="text-warning">{{ "Average" }}</span>
                        @elseif($rating->rating_level == 3)
                            <span class="text-success">{{ "Good" }}</span>
                        @elseif($rating->rating_level == 4)
                            <span class="text-success">{{ "Very Good" }}</span>
                        @else($rating->rating_level == 5)
                            <span class="text-success">{{ "Excellent" }}</span>
                        @endif
                      </h5>
                      <p class="card-text">
                        {{$rating->description ?? 'No Description'}}
                        <hr>
                        Created At: {{$rating->created_at}}
                       </p>
                       {{-- d-flex justify-content-center --}}
                       <p class="alert alert-secondary d-flex flex-wrap mx-auto text-center w-50 pb-3 shadow rounded text-secondary">
                            <span class="mx-auto">
                                {{ $rating->product->title }}
                            </span>
                       </p>
                       <form action="{{ route('ratings.destroy', $rating->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger border-2 border-dark" type="submit"><i class="fas fa-trash-alt p-1"></i> Delete</button>
                       </form>
                    </div>
                  </div>
            </div>
        @endforeach
        <div class="my-4">
            {{-- {{$ratings->links()}} --}}
        </div>
    </div>
</div>
@endsection

