@extends('layouts.app')

@section('title', 'Peminjaman Hari Ini')
@section('description', 'Halaman Daftar Peminjaman Hari Ini')

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <div class="alert alert-info" role="alert">
          Secara default data peminjaman akan tampil dengan tanggal hari ini. Jika ingin melihat data
          peminjaman
          dengan tanggal yang spesifik bisa menggunakan fitur pencarian di bawah.
        </div>

        <form action="" method="GET">
          <div class="d-flex">
            <div class="flex-fill">
              <label for="date" class="form-label">Tanggal Awal:</label>
              <input type="date" name="date" id="date" class="form-control" placeholder="Pilih tanggal awal..">
            </div>
          </div>

          <div class="d-flex pt-3 pb-3">
            <button type="submit" class="btn btn-primary flex-fill">Cari</button>
          </div>
        </form>

        <table class="table" id="datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
