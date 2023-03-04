@extends('layouts.app')

@section('title', 'Daftar Komoditas')
@section('description', 'Halaman daftar komoditas')

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($commodities as $commodity)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $commodity->name }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item text-success" href="#">Ubah</a></li>
                      <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
