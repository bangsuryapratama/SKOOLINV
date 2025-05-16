<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">

  <!-- Preload main CSS -->
  <link rel="preload" href="assets/css/bootstrap.min.css" as="style">
  <link rel="preload" href="assets/css/bootstrap-extended.css" as="style">
  <link rel="preload" href="assets/css/main.min.css" as="style">

  <!-- CSS Utama -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-extended.css">
  <link rel="stylesheet" href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" href="assets/plugins/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="assets/css/main.min.css"> <!-- Gabungan dari semua theme CSS -->

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Pace loader -->
  <script src="assets/js/pace.min.js" defer></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

</head>

<body>

  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
      @include('layouts.kerangka.sidebar')
    </div>

    <!-- Main Panel -->
    <div class="main-panel">
      <div class="main-header">
        @include('layouts.kerangka.navbar')
      </div>

      <!-- Table Section -->
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Halaman Data Barang Keluar</h3>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="card-title mb-0">Data Barang</div>
                  <a href="{{ route('barang.create') }}" class="btn btn-sm btn-success me-4">
                  <i class="fa fa-plus"></i></a>
                </div>


                @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        showConfirmButton: true,
                        timer: 3000
                    });
                </script>
                @endif

                <div class="card-body">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama</th>
                                <th>Merek</th>
                                <th>Foto</th>
                                <th>Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach ($barangs as $data)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $data->kode_barang }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>
                                <img src="{{ asset('/images/barangs/' . $data->foto) }}" width="70" alt="">
                            </td>
                            <td>{{ $data->stok }}</td>
                            <td class="text-center col-4">
                                <form action="{{ route('barang.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Anda ingin menghapus data tersebut?');">
                                <a href="{{ route('barang.show', $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                </button>
                                </form>
                               </td>
                            </tr>
                        @endforeach
                       </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- end card -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end main-panel -->
  </div> <!-- end wrapper -->

  <!-- JavaScript di akhir untuk mempercepat render -->
  <script src="assets/js/jquery.min.js" defer></script>
  <script src="assets/js/bootstrap.bundle.min.js" defer></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js" defer></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js" defer></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js" defer></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js" defer></script>
  <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js" defer></script>
  <script src="assets/js/main.js" defer></script>

  <script defer>
    document.addEventListener("DOMContentLoaded", function () {
      $('#example').DataTable();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('scripts')

</body>

</html>
