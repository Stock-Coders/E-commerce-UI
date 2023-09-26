@extends('layouts.master')

@section('title', 'Contact Us')

<style>
.contact-container{
    margin-top: 5.5%;
    margin-bottom: 2%;
}
</style>

@section("main")
<div class="conatiner contact-container">
    <div class="text-center">
        <h3 class="text-primary">How Can We Help You?</h3>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisic</p>
        <p class="text-center" >
            @if(session()->has('successful_contact'))
                <div class="alert alert-success text-center mx-auto" style="width: 40%; margin-top: 3%;">
                    {{ session()->get('successful_contact') }}
                </div>
            @endif
        </p>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <div class="bg-white col-md-4">
            <div class="p-4 rounded shadow-md">
                <form action="{{ route("contacts.store") }}" method="post">
                    @csrf
                    <div>
                        <label for="name" class="form-label">Your Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Your Email</label><span class="text-danger">*</span>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="xxxxx@example.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div class="mt-3">
                    <div class="mt-3">
                        <label for="phone" class="form-label">Your Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Your Phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div class="mt-3">
                    <div class="mt-3">
                        <label for="subject" class="form-label">Subject</label><span class="text-danger">*</span>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="message" class="form-label">Message</label><span class="text-danger">*</span>
                        <textarea name="message" cols="20" rows="6" class="form-control @error('message') is-invalid @enderror" placeholder="message"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
