@extends('authentication.layouts.app')

@section('title', 'Login')

@section('content')
<div class="row h-100">
  <div class="col-lg-5 col-12">
    <div id="auth-left">
      <h1 class="auth-title">Log in.</h1>
      <p class="auth-subtitle mb-5">
        Login untuk melanjutkan.
      </p>
      @include('utilities.alert')
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="email" name="email" class="form-control form-control-xl" placeholder="Email"
            value="{{ old('email') }}" autofocus required />
          <div class="form-control-icon">
            <i class="bi bi-person"></i>
          </div>
          @error('email', 'authentication')
          <div class="d-block invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required />
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          @error('password', 'authentication')
          <div class="d-block invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
          <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label text-gray-600" for="flexCheckDefault">
            Keep me logged in
          </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
          Log in
        </button>
      </form>
    </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right"></div>
  </div>
</div>
@endsection