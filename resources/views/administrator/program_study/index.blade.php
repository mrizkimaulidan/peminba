@extends('layouts.app')

@section('title', 'Daftar Program Studi')
@section('description', 'Halaman daftar program studi')

@section('content')
<section class="row">
  <div class="col-12">
    @include('utilities.alert')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>
      <div class="card-body">
        <x-button-group-flex>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="bi bi-file-excel"></i>
            Impor Excel
          </button>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#createProgramStudyModal">
            <i class="bi bi-plus-circle-fill"></i>
            Tambah Program Studi
          </button>
        </x-button-group-flex>

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
              @foreach ($programStudies as $programStudy)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $programStudy->name }}</td>
                <td>
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-success editProgramStudyButton" data-bs-toggle="modal"
                      data-id="{{ $programStudy->id }}" data-bs-target="#editProgramStudyModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    <form action="{{ route('administrators.program-studies.destroy', $programStudy) }}" method="POST">
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
@include('administrator.program_study.modal.create')
@include('administrator.program_study.modal.edit')
@include('administrator.program_study.modal.import')
@endpush

@push('script')
@include('administrator.program_study.script')
@endpush
