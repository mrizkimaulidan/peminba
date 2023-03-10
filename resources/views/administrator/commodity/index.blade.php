@extends('layouts.app')

@section('title', 'Daftar Komoditas')
@section('description', 'Halaman daftar komoditas')

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
            <button type="button" class="btn btn-primary" id="createCommodityButton" data-bs-toggle="modal"
              data-bs-target="#createCommodityModal">
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
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($commodities as $commodity)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $commodity->name }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <button type="button" class="dropdown-item text-success editCommodityButton"
                          data-bs-toggle="modal" data-id="{{ $commodity->id }}" data-bs-target="#editCommodityModal">
                          Ubah
                        </button>
                      </li>
                      <li>
                        <form action="{{ route('administrators.commodities.destroy', $commodity) }}" method="POST">
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
@include('administrator.commodity.modal.create')
@include('administrator.commodity.modal.edit')
@endpush

@push('script')
@include('administrator.commodity.script')
@endpush
