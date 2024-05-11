<div class="modal fade" id="editStudentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Ubah Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12 col-lg-4">
              <div class="mb-3">
                <label for="identification_number" class="form-label">NIM Mahasiswa</label>
                <input type="text" name="identification_number" id="identification_number" class="form-control"
                  placeholder="Masukkan nim mahasiswa..">
              </div>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama mahasiswa..">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="program_study_id" class="form-label">Program Studi</label>
                <select class="form-select" name="program_study_id" id="program_study_id">
                  <option selected>Pilih..</option>
                  @foreach ($programStudies as $programStudy)
                  <option value="{{ $programStudy->id }}">{{ $programStudy->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="school_class_id" class="form-label">Kelas</label>
                <select class="form-select" name="school_class_id" id="school_class_id">
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
              <label for="email" class="form-label">Alamat Email</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan alamat email..">
              </div>
            </div>
            <div class="col">
              <label for="phone_number" class="form-label">Nomor Handphone</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="text" name="phone_number" id="phone_number" class="form-control"
                  placeholder="Masukkan nomor handphone..">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                  placeholder="Masukkan password..">
                <small class="text-muted">Kosongkan kolom password jika tidak ingin diubah</small>
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password" class="form-control"
                  placeholder="Masukkan password..">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>