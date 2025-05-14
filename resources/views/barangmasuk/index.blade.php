<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Favicon -->
 <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">

 <!-- Loader -->
 <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
 <script src="{{ asset('assets/js/pace.min.js') }}"></script>

 <!-- SweetAlert2 CDN -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- Plugins -->
 <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">

 <!-- Bootstrap & DataTable -->
 <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

 <!-- Fonts & Icons -->
 <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

 <!-- Main CSS -->
 <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
 <link href="{{ asset('sass/main.css') }}" rel="stylesheet">
 <link href="{{ asset('sass/dark-theme.css') }}" rel="stylesheet">
 <link href="{{ asset('sass/blue-theme.css') }}" rel="stylesheet">
 <link href="{{ asset('sass/semi-dark.css') }}" rel="stylesheet">
 <link href="{{ asset('sass/bordered-theme.css') }}" rel="stylesheet">
 <link href="{{ asset('sass/responsive.css') }}" rel="stylesheet">\

 

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
            <h3 class="fw-bold mb-3">Halaman Data Barang Masuk</h3>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Data Barang Keluar</div>
                </div>

                @if (session('success'))
                <script>
                  document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                      icon: 'success',
                      title: 'Berhasil!',
                      text: '{{ session('success') }}',
                      showConfirmButton: true,
                      timer: 3000
                    });
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
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                            <th>Keterangan</th>
                            <th>ID_BARANG</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($barangmasuk as $data)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->kode_barang }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->tglmasuk }}</td>
                            <td>{{ $data->ket }}</td>
                            <td>{{ $data->barang->nama }}</td>
                            <td class="text-center col-4">
                              <form action="{{ route('barangmasuk.destroy', $data->id) }}" method="POST"
                                onsubmit="return confirm('Anda ingin menghapus data tersebut?');">
                                <a href="{{ route('barangmasuk.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <div class="ms-2 mt-3">
                        <a href="{{ route('barangmasuk.create') }}" class="btn btn-sm btn-success">Add</a>
                      </div>
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

</body>

</html>
