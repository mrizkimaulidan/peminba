@extends('errors.layouts.app')

@section('title', '503')

@section('content')
<img class="img-error" src="{{ asset('images/samples/error-500.svg') }}" alt="Not Found">
<h1 class="error-title">System Error</h1>
<p class="fs-5 text-gray-600">The website is currently unavailable. Try again later or contact the
    developer.</p>
<a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
@endsection