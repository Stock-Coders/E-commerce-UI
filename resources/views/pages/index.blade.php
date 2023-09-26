@extends('layouts.master')

@section('title', 'Website UI')

@section('main')
    @include("pages.includes-all-static-pages.home")
    @include("pages.includes-all-static-pages.about")
    @include("pages.includes-all-static-pages.services")
    @include("pages.includes-all-static-pages.portfolio")
@endsection
