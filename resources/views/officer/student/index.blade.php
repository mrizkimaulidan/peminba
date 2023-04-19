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
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-primary showStudentButton" data-bs-toggle="modal"
                      data-id="{{ $student->id }}" data-bs-target="#detailStudentModal">
                      <i class="bi bi-eye-fill"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-success editStudentButton" data-bs-toggle="modal"
                      data-id="{{ $student->id }}" data-bs-target="#editStudentModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    <form action="{{ route('officers.students.destroy', $student) }}" method="POST">
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
@include('officer.student.modal.create')
@include('officer.student.modal.show')
@include('officer.student.modal.edit')
@endpush

@push('script')
@include('officer.student.script')
@endpush
