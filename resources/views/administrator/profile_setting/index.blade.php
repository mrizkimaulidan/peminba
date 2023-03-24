@extends('layouts.app')

@section('title', 'Pengaturan Profil')
@section('description', 'Halaman pengaturan profil')

@section('content')
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>

      <div class="card-body">
        @include('utilities.alert')
        <form action="{{ route('administrators.profile-settings.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"
              placeholder="Masukkan nama..">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}"
              placeholder="Masukkan email..">
          </div>
          <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number:</label>
            <input type="text" class="form-control" name="phone_number" value="{{ auth()->user()->phone_number }}"
              placeholder="Masukkan nomor handphone..">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password..">
            <small class="text-muted">Kosongkan kolom password jika tidak ingin diubah</small>
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
            <input type="password_confirmation" class="form-control" name="password_confirmation"
              placeholder="Ulangi password..">
          </div>

          <button type="submit" class="btn btn-success">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
