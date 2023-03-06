@if(session('success'))
<div class="alert alert-success alert-dismissible show fade">
  <i class="bi bi-check2-circle"></i> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
