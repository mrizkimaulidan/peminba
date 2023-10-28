<div class="modal fade" id="returnBorrowingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Kembalikan Peminjaman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('students.borrowings.return', $borrowing) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-primary">
                Pengembalian peminjaman.
              </div>

              <div class="mb-3">
                <label for="note" class="form-label">Catatan:</label>
                <textarea class="form-control" name="note" id="note" placeholder="Masukan catatan (opsional).."
                  rows="5"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success btn-returned">Kembalikan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
