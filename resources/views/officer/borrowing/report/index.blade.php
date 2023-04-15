@extends('layouts.app')

@section('title', 'Laporan Peminjaman')
@section('description', 'Halaman Laporan Peminjaman')

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <form action="" method="GET">
          <div class="d-flex">
            <div class="flex-fill">
              <label for="start_date" class="form-label">Tanggal Awal:</label>
              <div class="input-group">
                <div class="input-group-text">
                  <div><i class="bi bi-calendar-date-fill"></i></div>
                </div>
                <input type="date" name="start_date" id="start_date" class="form-control"
                  placeholder="Pilih tanggal awal..">
              </div>
            </div>
            <div class="flex-fill">
              <label for="end_date" class="form-label">Tanggal Akhir:</label>
              <div class="input-group">
                <div class="input-group-text">
                  <div><i class="bi bi-calendar-date-fill"></i></div>
                </div>
                <input type="date" name="end_date" id="end_date" class="form-control"
                  placeholder="Pilih tanggal akhir..">
              </div>
            </div>
          </div>

          <div class="d-flex pt-3 pb-3">
            <button type="submit" class="btn btn-primary flex-fill">Cari</button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Komoditas</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Pinjam</th>
                <th scope="col">Jam Kembali</th>
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
                <td>{{ $borrowing->date }}</td>
                <td>{{ $borrowing->time_start }}</td>
                <td>
                  @if($borrowing->time_end === NULL)
                  <span class="badge text-bg-info" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Sedang dipinjam">
                    <i class="bi bi-clock"></i></span>
                  @else
                  {{ $borrowing->time_end }}
                  @endif
                </td>
                <td>
                  @if($borrowing->officer_id === NULL)
                  <span class="badge text-bg-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Belum Divalidasi!">
                    <i class="bi bi-exclamation-circle"></i>
                  </span>
                  @else
                  {{ $borrowing->officer->name }}
                  @endif
                </td>
                <td>
                  @if($borrowing->time_end !== NULL && $borrowing->officer_id === NULL)
                  <form action="{{ route('officers.borrowings.validate', $borrowing) }}">
                    <button type="submit" class="btn btn-sm btn-info btn-validate" data-bs-toggle="tooltip"
                      data-bs-placement="top" data-bs-title="Validasi">
                      <i class="bi bi-person-lines-fill"></i>
                    </button>
                  </form>
                  @endif
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
