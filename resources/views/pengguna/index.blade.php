<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- favicon -->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />

  <!-- loader -->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- plugins -->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/metisMenu.min.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/mm-vertical.css" rel="stylesheet" />
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet" />

  <!-- main css -->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="sass/main.css" rel="stylesheet" />
  <link href="sass/dark-theme.css" rel="stylesheet" />
  <link href="sass/blue-theme.css" rel="stylesheet" />
  <link href="sass/semi-dark.css" rel="stylesheet" />
  <link href="sass/bordered-theme.css" rel="stylesheet" />
  <link href="sass/responsive.css" rel="stylesheet" />

  <title>Halaman Data Petugas</title>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
      @include('layouts.kerangka.sidebar')
    </div>
    <!-- End Sidebar -->

    <!-- Main Panel -->
    <div class="main-panel">
      <div class="main-header">
        <!-- Navbar Header -->
        @include('layouts.kerangka.navbar')
        <!-- End Navbar -->
      </div>

      <!-- Table Container -->
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Halaman Data Petugas</h3>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="card-title mb-0">Data Petugas</div>
                  <div>
                    <a href="{{ route('petugas.export') }}" class="btn btn-sm btn-danger me-2">
                      <i class="fa fa-file-pdf"></i> Export PDF
                    </a>
                    <a href="{{ route('pengguna.create') }}" class="btn btn-sm btn-success">
                      <i class="fa fa-plus"></i>
                    </a>
                  </div>
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
                      <table class="table" id="tabelPetugas">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($pengguna as $data)
                          <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td class="text-center col-4">
                              <form action="{{ route('pengguna.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Anda ingin menghapus data tersebut?');">
                                <a href="{{ route('pengguna.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                  <i class="fa fa-pen"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Table Container -->
      </div>
    </div>
    <!-- End Main Panel -->
  </div>

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

  <!-- DataTables Initialization -->
  <script>
    $(document).ready(function () {
      $('#tabelPetugas').DataTable();
    });
  </script>
</body>

</html>
