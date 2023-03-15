@extends('layouts.app')

@section('title', 'Daftar Administrator')
@section('description', 'Halaman daftar administrator')

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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#createAdministratorModal">
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
                  @if(auth()->id() === $user->id)
                  <div class="btn-group gap-1">
                    <button type="button" class="btn btn-sm btn-success editAdministratorButton" data-bs-toggle="modal"
                      data-id="{{ $user->id }}" data-bs-target="#editAdministratorModal">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    @if(auth()->id() !== $user->id)
                    <form action="{{ route('administrators.users.destroy', $user) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger btn-delete">
                        <i class="bi bi-trash-fill"></i>
                      </button>
                      @endif
                    </form>
                  </div>
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

@push('modal')
@include('administrator.user.modal.create')
@include('administrator.user.modal.edit')
@endpush

@push('script')
@include('administrator.user.script')
@endpush