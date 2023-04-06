@extends('layouts.app')

@section('title', 'Peminjaman Saya Hari Ini')
@section('description', 'Halaman Daftar Peminjaman Saya Hari Ini')

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        @include('utilities.alert')
        <div class="alert alert-warning" role="alert">
          <i class="bi bi-exclamation-circle"></i>
          Data di bawah hanya akan tampil data peminjaman pada hari ini saja. Jika ingin melihat histori data peminjaman
          yang sudah anda pinjam bisa pergi ke menu histori peminjaman pada daftar menu.

          <div class="fw-bold pt-3">
            Diharapkan setiap peminjaman yang sudah selesai mohon lakukan pengubahan data pada tombol Pengembalian.
          </div>
        </div>

        <div class="table-responsive">
          <div class="d-flex flex-row-reverse pb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#addBorrowingModal">Tambah Peminjaman</button>
          </div>

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
                  @if($borrowing->officer_id !== NULL)
                  <span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Sudah divalidasi oleh {{ $borrowing->officer->name }}">
                    <i class="bi bi-check-circle"></i>
                  </span>
                  @else
                  <span class="badge text-bg-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Belum divalidasi oleh petugas!">
                    <i class="bi bi-exclamation-circle"></i>
                  </span>
                  @endif
                </td>
                <td>
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-info showBorrowingButton" data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}" data-bs-target="#detailBorrowingModal">
                      <i class="bi bi-eye-fill"></i>
                    </button>

                    @if($borrowing->time_end === NULL)
                    <form action="{{ route('students.borrowings.returned', $borrowing) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-sm btn-warning">
                        <i class="bi bi-check-circle-fill"></i>
                      </button>
                    </form>
                    @endif

                    @if($borrowing->time_end === NULL)
                    <button type="button" class="btn btn-sm btn-success editBorrowingButton" data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}" data-bs-target="#editBorrowingModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>
                    @endif

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
  </div>
</section>
@endsection

@push('modal')
@include('student.borrowing.main.modal.create')
@include('student.borrowing.main.modal.show')
@include('student.borrowing.main.modal.edit')
@endpush

@push('script')
@include('student.borrowing.script')
@endpush
