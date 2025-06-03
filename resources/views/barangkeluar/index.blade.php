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
  <link rel="stylesheet" href="assets/plugins/metismenu/metisMenu.min.css" />
  <link rel="stylesheet" href="assets/plugins/metismenu/mm-vertical.css" />
  <link rel="stylesheet" href="assets/plugins/simplebar/css/simplebar.css" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="sass/main.css" rel="stylesheet" />
  <link href="sass/dark-theme.css" rel="stylesheet" />
  <link href="sass/blue-theme.css" rel="stylesheet" />
  <link href="sass/semi-dark.css" rel="stylesheet" />
  <link href="sass/bordered-theme.css" rel="stylesheet" />
  <link href="sass/responsive.css" rel="stylesheet" />

  <style>
    table#example {
      width: 100% !important;
      table-layout: auto;
    }

    table#example th,
    table#example td {
      white-space: nowrap;
      vertical-align: middle;
    }
  </style>
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
      <div class="container-fluid">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Halaman Data Barang Keluar</h3>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="card-title mb-0">Data Barang Keluar</div>
                  <div>
                    <a href="{{ route('barangkeluar.export') }}" class="btn btn-sm btn-danger me-2">
                      <i class="fa fa-file-pdf"></i> Export PDF
                    </a>
                    <a href="{{ route('barangkeluar.create') }}" class="btn btn-sm btn-success">
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
                    timer: 3000,
                  });
                </script>
                @endif

                <div class="card-body">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="example" style="width: 100%; table-layout: auto;">
                        <thead>
                          <tr>
                            <th style="width: 60px;">No</th>
                            <th style="width: 150px;">Kode Barang</th>
                            <th style="width: 250px;">Nama Barang</th>
                            <th style="width: 150px;">Tanggal Keluar</th>
                            <th style="width: 120px;">Jumlah Keluar</th>
                            <th style="width: 150px;" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($barangkeluar as $bk)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $bk->kode_barang }}</td>
                            <td>{{ $bk->barang->nama }}</td>
                            <td>{{ $bk->tglkeluar }}</td>
                            <td>{{ $bk->jumlah }}</td>
                            <td class="text-center">
                              <form action="{{ route('barangkeluar.destroy', $bk->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');" style="display: inline-block;">
                                <a href="{{ route('barangkeluar.show', $bk->id) }}" class="btn btn-sm btn-warning" title="Lihat Detail">
                                  <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('barangkeluar.edit', $bk->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                  <i class="fa fa-pen"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- end card-body -->
              </div> <!-- end card -->
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end main-panel -->
  </div> <!-- end wrapper -->

  <!-- Scripts -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        "autoWidth": false,
        "lengthChange": true,
        "pageLength": 10,
        "language": {
          "search": "Cari:",
          "lengthMenu": "Tampilkan _MENU_ data per halaman",
          "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          "paginate": {
            "first": "Awal",
            "last": "Akhir",
            "next": "Selanjutnya",
            "previous": "Sebelumnya"
          }
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('scripts')
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
