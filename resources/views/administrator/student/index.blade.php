@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')
@section('description', 'Halaman daftar mahasiswa')

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <div class="d-flex flex-row-reverse mb-3">
          <div class="p-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStudentModal">
              <i class="bi bi-plus-circle-fill"></i>
              Tambah
            </button>
          </div>
        </div>
        @include('utilities.alert')
        <div class="table-responsive">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                  <span class="badge rounded-pill text-bg-primary">{{ $student->identification_number }}</span>
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->programStudy->name }}</td>
                <td>{{ $student->schoolClass->name }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <button type="button" class="dropdown-item showStudentButton" data-bs-toggle="modal"
                          data-id="{{ $student->id }}" data-bs-target="#detailStudentModal">
                          Detail
                        </button>
                      </li>
                      <li>
                        <button type="button" class="dropdown-item text-success editStudentButton"
                          data-bs-toggle="modal" data-id="{{ $student->id }}" data-bs-target="#editStudentModal">
                          Ubah
                        </button>
                      </li>
                      <li>
                        <form action="{{ route('administrators.students.destroy', $student) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="dropdown-item text-danger btn-delete">Hapus</button>
                        </form>
                      </li>
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

@push('modal')
@include('administrator.student.modal.create')
@include('administrator.student.modal.show')
@include('administrator.student.modal.edit')
@endpush

@push('script')
@include('administrator.student.script')
@endpush
