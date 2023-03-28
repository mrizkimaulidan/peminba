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
              <div class="input-group">
                <span class="input-group-text">
                  <div>
                    <i class="bi bi-calendar-date-fill"></i>
                  </div>
                </span>
                <input type="date" name="date" id="date" class="form-control" placeholder="Pilih tanggal awal..">
              </div>
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
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Komoditas</th>
              <th scope="col">Mata Kuliah</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Waktu Pinjam</th>
              <th scope="col">Petugas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($borrowings as $borrowing)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <th>
                <span class="badge text-bg-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                  data-bs-title="{{ $borrowing->student->identification_number }}">{{
                  $borrowing->student->name }}</span>
              </th>
              <td>{{ $borrowing->commodity->name }}</td>
              <td>
                <span class="badge text-bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                  data-bs-title="{{ $borrowing->subject->code }}">{{
                  $borrowing->subject->name }}</span>
              </td>
              <td>{{ $borrowing->date }}</td>
              <td>{{ $borrowing->time_start }}</td>
              <td>
                @if($borrowing->officer === NULL)
                <span class="badge text-bg-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                  data-bs-title="Belum diisi!">
                  <i class="bi bi-exclamation-circle"></i>
                </span>
                @else
                <span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                  data-bs-title="Sudah diisi oleh {{ $borrowing->officer }}">
                  <i class="bi bi-check-circle"></i>
                  @endif
              </td>
              <td>
                <div class="btn-group gap-1">
                  <button type="button" class="btn btn-sm btn-success editProgramStudyButton" data-bs-toggle="modal"
                    data-id="#" data-bs-target="#editProgramStudyModal">
                    <i class="bi bi-pencil-fill"></i>
                  </button>

                  <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i
                        class="bi bi-trash-fill"></i></button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@push('script')
@include('administrator.borrowing.script')
@endpush
