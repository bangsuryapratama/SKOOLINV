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

   <!-- SweetAlert2 CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <!-- Main Panel -->
    <div class="main-panel">
      <div class="main-header">
        @include('layouts.kerangka.navbar')
      </div>

      <!-- Table Section -->
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Halaman Data Peminjaman</h3>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="card-title mb-0">Data Peminjam</div>
                  <a href="{{ route('peminjaman.create') }}" class="btn btn-sm btn-success me-4">
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
                            <th>Kode Peminjam</th>
                            <th>Jumlah</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($pinjam as $data)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->kode_barang }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->nama_peminjam }}</td>
                            <td>{{ $data->tglpinjam }}</td>
                            <td>{{ $data->tglkembali }}</td>
                            <td>
                              <span class="badge {{ $data->status == 'Sedang Dipinjam' ? 'bg-danger' : 'bg-success' }}">
                                {{ $data->status }}
                              </span>
                            </td>
                            <td>{{ $data->barang->nama }}</td>
                            <td class="text-center col-4">
                              
                              <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Anda ingin menghapus data tersebut?');">
                                <a href="{{ route('peminjaman.show', $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
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

 <!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>