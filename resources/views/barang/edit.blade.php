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
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
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

        {{-- Table --}}
        <div class="container">
        <div class="page-inner">
            <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Data Barang</h3>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="color: #000">Edit Data Barang</h4>

            <form action="{{ route('barang.update' , $barangs->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @method('PUT')

                {{-- <div class="form-group">
                    <label for="exampleInputName1">Kode Barang</label>
                    <input type="text" class="form-control  @error('kode_barang') is-invalid @enderror" name="kode_barang"
                        value="{{ $barangs->kode_barang }}" placeholder="Masukan Kode Barang" id="kodebarang"
                        style="color: #000; background-color: #f5f5f5;">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <label for="exampleInputEmail3">Nama Barang</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        value="{{ $barangs->nama }}" placeholder="Masukan Nama Barang" id="putih"
                        style="color: #000; background-color: #f5f5f5;">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Merk</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk"
                        value="{{ $barangs->merk }}" placeholder="Masukan Merk" id="putih" style="color: #000; background-color: #f5f5f5;">
                    @error('merk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Foto :</label> <br>
                    <img src="{{ asset('/images/barangs/' . $barangs->foto) }}" width="80" alt="">
                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                        placeholder="Masukan Foto" name="foto" id="putih"
                        style="color: #000; background-color: #f5f5f5;">
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                        value="{{ $barangs->stok }}" placeholder="Masukan Stok" id="putih" style="color: #000; background-color: #f5f5f5;">
                    @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary ms-1 mt-3">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn-dark mt-3">Kembali</a>
            </form>
          </div>
        </div>
     </div>
    </div>
</div>
</div>
</div>
        {{-- Akhir Table --}}

  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>


</body>

</html>