@if(session('success'))
<div class="alert alert-success alert-dismissible show fade">
  <i class="bi bi-check2-circle"></i> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible show fade">
  <i class="bi bi-shield-fill-exclamation"></i> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->store->any())
<div class="alert alert-danger alert-dismissible show fade">
  <i class="bi bi-exclamation-circle"></i>
  <span class="fw-bold">Data gagal ditambahkan!</span>
  <div class="col-md-6">
    <ul>
      @foreach ($errors->store->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->update->any())
<div class="alert alert-danger alert-dismissible show fade">
  <i class="bi bi-exclamation-circle"></i>
  <span class="fw-bold">Data gagal diubah!</span>
  <div class="col-md-6">
    <ul>
      @foreach ($errors->update->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
