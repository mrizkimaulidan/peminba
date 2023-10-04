@extends('layouts.app')

@section('title', 'Dashboard')
@section('description', 'Halaman dashboard')

@section('content')
<section class="row">
  <div class="col-12 col-lg-9">
    <div class="row">
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <a href="{{ route('administrators.users.index') }}">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Total Administrator</h6>
                  <h6 class="font-extrabold mb-0">{{ $counts['administrator'] }}</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <a href="{{ route('administrators.students.index') }}">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon green mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Total Mahasiswa</h6>
                  <h6 class="font-extrabold mb-0">{{ $counts['student'] }}</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <a href="{{ route('administrators.commodities.index') }}">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon red mb-2">
                    <i class="iconly-boldBookmark"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Total Komoditas</h6>
                  <h6 class="font-extrabold mb-0">{{ $counts['commodity'] }}</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Peminjaman Tahun Ini</h4>
          </div>
          <div class="card-body">
            <div id="chart-borrowings-this-year"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4>Komoditas Yang Belum Dikembalikan</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-lg" id="datatable">
                <thead>
                  <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Komoditas</th>
                    <th>Tanggal Peminjaman</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($borrowingsNotReturned as $borrowing)
                  <tr>
                    <td>
                      <span class="badge text-bg-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="{{ $borrowing->student->identification_number }} - {{ $borrowing->student->phone_number }}">{{
                        $borrowing->student->name }}</span>
                    </td>
                    <td>{{ $borrowing->commodity->name }}</td>
                    <td>{{ $borrowing->date }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="card">
      <div class="card-body py-4 px-4">
        <div class="d-flex align-items-center">
          <div class=" ms-3 name">
            <h5 class="font-bold">{{ auth('administrator')->user()->name }}</h5>
            <h6 class="text-muted mb-0">{{ auth('administrator')->user()->email }}</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Mahasiswa Yang Baru Terdaftar</h4>
      </div>
      <div class="card-content pb-4">
        @foreach ($latestRegisteredStudents as $student)
        <div class="recent-message d-flex px-4 py-3">
          <div class="name ms-4">
            <h5 class="mb-1">{{ $student->name }}</h5>
            <h6 class="text-muted mb-0">{{ $student->email }}</h6>
          </div>
        </div>
        @endforeach
        <div class="px-4">
          <a href="{{ route('administrators.students.index') }}"
            class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
            Daftar Mahasiswa
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('script')
@include('administrator.script')
@endpush