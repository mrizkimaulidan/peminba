<div class="modal fade" id="showBorrowingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Detail Peminjaman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="alert alert-primary">
                Data di bawah adalah detail data mahasiswa.
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nomor Identitas Mahasiswa</label>
                    <input class="form-control" placeholder="216152006" disabled>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input class="form-control" placeholder="Muhammad Rizki Maulidan" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input class="form-control" placeholder="Teknik Informatika" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input class="form-control" placeholder="TI 4C" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Nomor Handphone</label>
                    <input class="form-control" placeholder="+628123456789" disabled>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-6">
              <div class="alert alert-primary">
                Data di bawah adalah detail data peminjaman.
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nama Komoditas</label>
                    <input class="form-control" placeholder="Proyektor 1" disabled>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Pada Mata Kuliah</label>
                    <input class="form-control" placeholder="Praktek Sistem Basis Data" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Jam Pinjam</label>
                    <input class="form-control" placeholder="10:00:00" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Jam Kembali</label>
                    <input class="form-control" placeholder="-" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input class="form-control" placeholder="Sedang dipinjam" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" disabled></textarea>
                  </div>
                </div>
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
