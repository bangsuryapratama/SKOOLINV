<!doctype html>
<html lang="en" data-bs-theme="blue-theme">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- favicon -->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="sass/main.css" />
  <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/plugins/metismenu/metisMenu.min.css" />
  <link rel="stylesheet" href="assets/plugins/simplebar/css/simplebar.css" />
  <link rel="stylesheet" href="sass/blue-theme.css" />
  <link rel="stylesheet" href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap-extended.css" />
  <link rel="stylesheet" href="sass/responsive.css" />
  <link rel="stylesheet" href="assets/plugins/metismenu/mm-vertical.css" />
  <link rel="stylesheet" href="assets/css/pace.min.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet" />

  <!-- Scripts -->
  <script src="assets/js/pace.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
      @include('layouts.kerangka.sidebar')
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <!-- Navbar Header -->
        @include('layouts.kerangka.navbar')
        <!-- End Navbar -->
      </div>

      <!-- Content -->
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Tambahkan Data Petugas</h3>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="color: #000">Tambah Data Petugas</h4>

                  <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group">
                      <label for="name">Nama Petugas</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Nama Lengkap Petugas" id="putih"
                        style="color: #000; background-color: #f5f5f5;">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="Masukan Email" id="putih"
                        style="color: #000; background-color: #f5f5f5;">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                        placeholder="Masukan Password" id="putih"
                        style="color: #000; background-color: #f5f5f5;">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="password_confirmation">Konfirmasi Password</label>
                      <input type="text" class="form-control @error('password') is-invalid @enderror"
                        name="password_confirmation" placeholder="Masukan Konfirmasi Password" id="putih"
                        style="color: #000; background-color: #f5f5f5;">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 ms-1">Simpan</button>
                    <a href="{{ route('pengguna.index') }}" class="btn btn-dark mt-3">Kembali</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content -->
    </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
</body>
</html>
