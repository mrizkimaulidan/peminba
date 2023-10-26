@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')
@section('description', 'Halaman daftar mata kuliah')

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

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubjectModal">
            <i class="bi bi-plus-circle-fill"></i>
            Tambah Mata Kuliah
          </button>
        </x-button-group-flex>

        <div class="table-responsive">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subjects as $subject)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><span class="badge text-bg-primary">{{ $subject->code }}</span></td>
                <td>{{ $subject->name }}</td>
                <td>
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-success editSubjectButton" data-bs-toggle="modal"
                      data-id="{{ $subject->id }}" data-bs-target="#editSubjectModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    <form action="{{ route('administrators.subjects.destroy', $subject) }}" method="POST">
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
@include('administrator.subject.modal.create')
@include('administrator.subject.modal.edit')
@include('administrator.subject.modal.import')
@endpush

@push('script')
@include('administrator.subject.script')
@endpush
