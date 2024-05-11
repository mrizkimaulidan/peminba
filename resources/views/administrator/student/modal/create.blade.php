<div class="modal fade" id="createStudentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('administrators.students.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12 col-lg-4">
              <div class="mb-3">
                <label for="identification_number" class="form-label">NIM Mahasiswa</label>
                <input type="number" name="identification_number"
                  class="form-control @error('identification_number', 'store') is-invalid @enderror"
                  @if($errors->hasBag('store'))
                value="{{ old('identification_number') }}" @endif placeholder="Masukkan nim mahasiswa.." required>
                @error('identification_number', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="name" class="form-control @error('name', 'store') is-invalid @enderror"
                  @if($errors->hasBag('store'))
                value="{{ old('name') }}" @endif placeholder="Masukkan nama mahasiswa.." required>
                @error('name', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="program_study_id" class="form-label">Program Studi</label>
                <select class="form-select @error('program_study_id', 'store') is-invalid @enderror"
                  name="program_study_id" required>
                  <option value="0">Pilih..</option>
                  @foreach ($programStudies as $programStudy)
                  <option value="{{ $programStudy->id }}" {{ old('program_study_id')===(string)$programStudy->id ?
                    'selected' :
                    '' }}>{{
                    $programStudy->name }}</option>
                  @endforeach
                </select>
                @error('program_study_id', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="school_class_id" class="form-label">Kelas</label>
                <select class="form-select @error('school_class_id', 'store') is-invalid @enderror"
                  name="school_class_id" required>
                  <option value="0">Pilih..</option>
                  @foreach ($schoolClasses as $schoolClass)
                  <option value="{{ $schoolClass->id }}" {{ old('school_class_id')===(string)$schoolClass->id ?
                    'selected' : ''}}>{{
                    $schoolClass->name }}</option>
                  @endforeach
                </select>
                @error('school_class_id', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <label for="email" class="form-label">Alamat Email</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input type="email" name="email" class="form-control @error('email', 'store') is-invalid @enderror"
                  @if($errors->hasBag('store'))
                value="{{ old('email') }}" @endif placeholder="Masukkan alamat email.." required>
                @error('email', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <label for="phone_number" class="form-label">Nomor Handphone</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="number" name="phone_number"
                  class="form-control @error('phone_number', 'store') is-invalid @enderror"
                  @if($errors->hasBag('store'))
                value="{{ old('phone_number') }}" @endif
                placeholder="Masukkan nomor handphone.." required>
                @error('phone_number', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password"
                  class="form-control @error('password', 'store') is-invalid @enderror"
                  placeholder="Masukkan password.." required>
                @error('password', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                  class="form-control @error('password_confirmation', 'store') is-invalid @enderror"
                  placeholder="Masukkan password.." required>
                @error('password_confirmation', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>