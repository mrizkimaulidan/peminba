<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="importModalLabel">Impor Excel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('administrators.program-studies.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="alert alert-warning">
            <h5>Perhatian!</h5> Jika terdapat data yang duplikat pada file excel terhadap data yang ada di dalam basis
            data, maka data tersebut akan dihiraukan oleh sistem. Berikut template excel dengan klik
            <a href="{{ asset('import-program-studi-template.xlsx') }}" class="alert-link"><i
                class="bi bi-download"></i>
              di
              sini</a>
          </div>

          <div class="mb-3">
            <label for="import" class="form-label">Pilih file:</label>
            <input class="form-control" type="file" name="import" id="import">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success">Impor</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
