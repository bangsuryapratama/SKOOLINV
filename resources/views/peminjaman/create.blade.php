<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--favicon-->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet">
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" href="assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" href="assets/plugins/simplebar/css/simplebar.css">

  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

  <!--main css-->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/blue-theme.css" rel="stylesheet">
  <link href="sass/semi-dark.css" rel="stylesheet">
  <link href="sass/bordered-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">
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

      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Tambahkan Data</h3>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="color: #000">Tambah Data Peminjam</h4>

                  <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group">
                      <label for="id_barang">ID_BARANG</label>
                      <select name="id_barang" id="id_barang" class="form-control @error('id_barang') is-invalid @enderror"
                        style="color: #000; background-color: #f5f5f5;" required>
                        <option value="" disabled selected>Pilih Barang</option>
                        @foreach ($pusat as $data)
                          <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                      </select>
                      @error('id_barang')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="jumlah">Jumlah</label>
                      <input type="number" min="1" class="form-control @error('jumlah') is-invalid @enderror"
                        name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukan jumlah" id="jumlah"
                        style="color: #000; background-color: #f5f5f5;" required>
                      @error('jumlah')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="mb-3 ms-2">
                      <label for="tglpinjam" class="form-label">Tanggal Dipinjam</label>
                      <input type="date" class="form-control @error('tglpinjam') is-invalid @enderror" id="tglpinjam"
                        name="tglpinjam" value="{{ old('tglpinjam') }}" required>
                      @error('tglpinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3 ms-2">
                      <label for="tglkembali" class="form-label">Tanggal Dikembalikan</label>
                      <input type="date" class="form-control @error('tglkembali') is-invalid @enderror" id="tglkembali"
                        name="tglkembali" value="{{ old('tglkembali') }}" required>
                      @error('tglkembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3 ms-2">
                      <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                      <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                        id="nama_peminjam" name="nama_peminjam" placeholder="Masukkan nama peminjam"
                        value="{{ old('nama_peminjam') }}" required>
                      @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-primary ms-1 mt-3">Simpan</button>
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-dark mt-3">Kembali</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .main-panel -->
  </div> <!-- .wrapper -->

  <!-- Bootstrap JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- Plugins -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
