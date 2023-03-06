<div class="modal fade" id="createCommodityModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('administrators.commodities.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="name" name="name" id="name" class="form-control" placeholder="Masukkan nama..">
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
