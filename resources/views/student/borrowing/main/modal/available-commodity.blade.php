<div class="modal fade" id="availableCommodityModal" tabindex="-1" aria-labelledby="availableCommodityModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="availableCommodityModalLabel">Daftar Komoditas Yang Tersedia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Komoditas</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($availableCommodities as $commodity)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ $commodity->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>
