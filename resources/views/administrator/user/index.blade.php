@extends('layouts.app')

@section('title', 'Daftar Administrator')
@section('description', 'Halaman daftar administrator')

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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#createAdministratorModal">
            <i class="bi bi-plus-circle-fill"></i>
            Tambah Administrator
          </button>
        </x-button-group-flex>

        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Handphone</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($administrators as $user)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-success editAdministratorButton" data-bs-toggle="modal"
                      data-id="{{ $user->id }}" data-bs-target="#editAdministratorModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    <form action="{{ route('administrators.users.destroy', $user) }}" method="POST">
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
@include('administrator.user.modal.create')
@include('administrator.user.modal.edit')
@endpush

@push('script')
@include('administrator.user.script')
@endpush
