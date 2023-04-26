@extends('layouts.app')

@section('title', 'Pengaturan Profil')
@section('description', 'Halaman pengaturan profil')

@section('content')
<div class="row">
  <div class="col-md-6">
    @include('utilities.alert')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('administrators.profile-settings.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control @error('name', 'update') is-invalid @enderror" name="name"
                  value="{{ auth('administrator')->user()->name }}" placeholder="Masukkan nama..">
                @error('name', 'update')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email:</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input type="email" class="form-control @error('email', 'update') is-invalid @enderror" name="email"
                  value="{{ auth('administrator')->user()->email }}" placeholder="Masukkan email..">
                @error('email', 'update')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <label for="phone_number" class="form-label">Nomor Handphone:</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="number" class="form-control @error('phone_number', 'update') is-invalid @enderror"
                  name="phone_number" value="{{ auth('administrator')->user()->phone_number }}"
                  placeholder="Masukkan nomor handphone..">
                @error('phone_number', 'update')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control @error('password', 'update') is-invalid @enderror"
                  name="password" placeholder="Masukkan password..">
                <small class="text-muted">Kosongkan kolom password jika tidak ingin diubah</small>
                @error('password', 'update')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                <input type="password_confirmation"
                  class="form-control @error('password_confirmation', 'update') is-invalid @enderror"
                  name="password_confirmation" placeholder="Ulangi password..">
                @error('password_confirmation', 'update')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
