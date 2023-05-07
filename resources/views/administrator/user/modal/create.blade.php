<div class="modal fade" id="createAdministratorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Administrator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('administrators.users.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name"
                  class="form-control @error('name', 'store') is-invalid @enderror" placeholder="Masukkan nama.."
                  @if($errors->hasBag('store'))
                value="{{ old('name') }}"
                @endif required>
                @error('name', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input type="email" name="email" id="email"
                  class="form-control @error('email', 'store') is-invalid @enderror" placeholder="Masukkan email.."
                  @if($errors->hasBag('store'))
                value="{{ old('email') }}" @endif required>
                @error('email', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="phone_number" class="form-label">Nomor Handphone</label>
              <div class="input-group mb-3">
                <span class="d-block input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="number" name="phone_number" id="phone_number"
                  class="form-control @error('phone_number', 'store') is-invalid @enderror"
                  placeholder="Masukkan nomor handphone.." @if($errors->hasBag('store'))
                value="{{ old('phone_number') }}" @endif required>
                @error('phone_number', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                  class="form-control @error('password', 'store') is-invalid @enderror"
                  placeholder="Masukkan password.." required>
                @error('password', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                  class="form-control @error('password_confirmation', 'store') is-invalid @enderror"
                  placeholder="Masukkan konfirmasi password.." required>
                @error('password_confirmation', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
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
