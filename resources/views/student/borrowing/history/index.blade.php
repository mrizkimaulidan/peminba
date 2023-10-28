@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')
@section('description', 'Halaman Daftar Riwayat Peminjaman')

@section('content')
<section class="row">
  <div class="col-12">
    @include('utilities.alert')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <div class="alert alert-info" role="alert">
          Tabel di bawah adalah daftar riwayat peminjaman yang sudah dilakukan oleh Anda.
        </div>
        <form action="" method="GET">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <div class="d-flex">
                  <div class="flex-fill">
                    <label for="date" class="form-label">Tanggal:</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <div>
                          <i class="bi bi-calendar-date-fill"></i>
                        </div>
                      </span>
                      <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}"
                        placeholder="Pilih tanggal..">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="status" class="form-label">Status pengembalian:</label>
                <select name="status" id="status" class="form-select">
                  <option value="" @selected(request('status')==='' )>Pilih status pengembalian..</option>
                  <option value="1" @selected(request('status')==='1' )>Sudah dikembalikan</option>
                  <option value="0" @selected(request('status')==='0' )>Belum dikembalikan</option>
                </select>
              </div>
            </div>
          </div>

          <div class="d-flex pt-3 pb-3">
            <button type="submit" class="btn btn-primary flex-fill">Cari</button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table datatable">
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
                <td>
                  <span class="badge text-bg-secondary">
                    <i class="bi bi-clock-fill"></i>
                    {{ $borrowing->time_start }}
                  </span>
                </td>
                <td>
                  @if($borrowing->time_end === NULL)
                  <span class="badge text-bg-info" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Sedang dipinjam">
                    <i class="bi bi-clock"></i></span>
                  @else
                  <span class="badge text-bg-secondary">
                    <i class="bi bi-clock-fill"></i>
                    {{ $borrowing->time_end }}
                  </span>
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
                    <button type="button" class="btn btn-sm btn-success showBorrowingButton" data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}" data-bs-target="#detailBorrowingModal">
                      <i class="bi bi-eye-fill"></i>
                    </button>

                    @if($borrowing->time_end === NULL)
                    <button type="button" class="btn btn btn-sm btn-warning" data-bs-toggle="modal"
                      data-bs-target="#returnBorrowingModal">
                      <i class="bi bi-check-circle-fill"></i>
                    </button>

                    @push('modal')
                    @include('student.borrowing.main.modal.return-borrowing')
                    @endpush
                    @endif
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
@include('student.borrowing.main.modal.show')
@endpush

@push('script')
@include('student.borrowing.script')
@endpush
