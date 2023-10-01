@extends('errors.layouts.app')

@section('title', '404')

@section('content')
<img class="img-error" src="{{ asset('images/samples/error-404.svg') }}" alt="Not Found">
<h1 class="error-title">NOT FOUND</h1>
<p class='fs-5 text-gray-600'>The page you are looking not found.</p>
<a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
@endsection