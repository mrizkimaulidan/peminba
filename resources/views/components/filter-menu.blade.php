<div>
  <form action="" method="GET">
    <div class="accordion pb-3">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelFilter"
            aria-expanded="true" aria-controls="panelFilter">
            <span class="me-3"><i class="bi bi-filter"></i></span>Filter (klik atau sentuh untuk membuka/menutup
            menu filter)
          </button>
        </h2>
        <div id="panelFilter" class="accordion-collapse collapse show">
          <div class="accordion-body">
            {{ $slot }}

            <div class="d-flex gap-1 pt-3 pb-3">
              <button type="submit" class="btn btn-primary flex-fill">Cari</button>
              <a href="{{ $resetButtonURL }}" class="btn btn-warning">Reset
                filter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
