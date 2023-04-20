@extends('layouts.app')

@section('title', 'Dashboard')
@section('description', 'Halaman dashboard')

@section('content')
<section class="row">
  <div class="col-12 col-lg-9">
    <div class="row">
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon blue mb-2">
                  <i class="iconly-boldProfile"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Total Administrator</h6>
                <h6 class="font-extrabold mb-0">183.000</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon green mb-2">
                  <i class="iconly-boldProfile"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Total Mahasiswa</h6>
                <h6 class="font-extrabold mb-0">80.000</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon red mb-2">
                  <i class="iconly-boldBookmark"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Total Komoditas</h6>
                <h6 class="font-extrabold mb-0">112</h6>
              </div>
            </div>
          </div>
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
            <h4>Latest Comments</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-lg">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Comment</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-3">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-md">
                          <img src="{{ asset('images/faces/5.jpg') }}" />
                        </div>
                        <p class="font-bold ms-3 mb-0">Si Cantik</p>
                      </div>
                    </td>
                    <td class="col-auto">
                      <p class="mb-0">
                        Congratulations on your graduation!
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-3">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-md">
                          <img src="{{ asset('images/faces/2.jpg') }}" />
                        </div>
                        <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                      </div>
                    </td>
                    <td class="col-auto">
                      <p class="mb-0">
                        Wow amazing design! Can you make another
                        tutorial for this design?
                      </p>
                    </td>
                  </tr>
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
        <h4>Mahasiswa Baru Terdaftar</h4>
      </div>
      <div class="card-content pb-4">
        <div class="recent-message d-flex px-4 py-3">
          <div class="name ms-4">
            <h5 class="mb-1">Hank Schrader</h5>
            <h6 class="text-muted mb-0">@johnducky</h6>
          </div>
        </div>
        <div class="recent-message d-flex px-4 py-3">
          <div class="name ms-4">
            <h5 class="mb-1">Dean Winchester</h5>
            <h6 class="text-muted mb-0">@imdean</h6>
          </div>
        </div>
        <div class="recent-message d-flex px-4 py-3">
          <div class="name ms-4">
            <h5 class="mb-1">John Dodol</h5>
            <h6 class="text-muted mb-0">@dodoljohn</h6>
          </div>
        </div>
        <div class="px-4">
          <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
            Daftar Mahasiswa
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('script')
@include('administrator.script')
@endpush
