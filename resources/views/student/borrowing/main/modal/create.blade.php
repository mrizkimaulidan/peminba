<div class="modal fade" id="addBorrowingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peminjaman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('students.borrowings.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="commodity_id" class="form-label">Komoditas</label>
                <select class="form-select" name="commodity_id" id="commodity_id">
                  <option selected>Pilih..</option>
                  @foreach ($commodities as $commodity)
                  <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="subject_id" class="form-label">Mata Kuliah</label>
                <select class="form-select" name="subject_id" id="subject_id">
                  <option selected>Pilih..</option>
                  @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <div class="input-group mb-3">
                  <span class="d-block input-group-text"><i class="bi bi-calendar-date-fill"></i></span>
                  <input type="date" class="form-control" name="date" id="date" placeholder="Pilih tanggal..">
                </div>
              </div>

              <div class="mb-3">
                <label for="time_start" class="form-label">Jam Pinjam</label>
                <div class="input-group mb-3">
                  <span class="d-block input-group-text"><i class="bi bi-clock-fill"></i></span>
                  <input type="time" class="form-control" name="time_start" id="time_start">
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
