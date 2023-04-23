<div class="modal fade" id="createStudentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('administrators.students.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-xs-12 col-md-4">
              <div class="mb-3">
                <label for="identification_number" class="form-label">NIM</label>
                <input type="number" name="identification_number" class="form-control" placeholder="Masukkan nim.."
                  required>
              </div>
            </div>
            <div class="col-xs-12 col-md-8">
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama.." required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-md-6">
              <div class="mb-3">
                <label for="program_study_id" class="form-label">Program Studi</label>
                <select class="form-select" name="program_study_id">
                  <option value="0" selected>Pilih..</option>
                  @foreach ($programStudies as $programStudy)
                  <option value="{{ $programStudy->id }}">{{ $programStudy->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="mb-3">
                <label for="school_class_id" class="form-label">Kelas</label>
                <select class="form-select" name="school_class_id">
                  <option selected>Pilih..</option>
                  @foreach ($schoolClasses as $schoolClass)
                  <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="email" class="form-label">Email</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email.." required>
              </div>
            </div>
            <div class="col">
              <label for="phone_number" class="form-label">Nomor Handphone</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="number" name="phone_number" class="form-control" placeholder="Masukkan nomor handphone.."
                  required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password.." required>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control"
                  placeholder="Masukkan password.." required>
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
