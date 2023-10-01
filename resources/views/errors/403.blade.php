@extends('errors.layouts.app')

@section('title', '403')

@section('content')
<img class="img-error" src="{{ asset('images/samples/error-403.svg') }}" alt="Not Found">
<h1 class="error-title">Forbidden</h1>
<p class="fs-5 text-gray-600">You are unauthorized to see this page.</p>
<a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
@endsection