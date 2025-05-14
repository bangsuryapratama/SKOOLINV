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
    @include('layouts.kerangka.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="main-header">
            <!-- Navbar -->
            @include('layouts.kerangka.navbar')
            <!-- End Navbar -->
        </div>

    {{-- Table --}}
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Halaman Data Barang</h3>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Barang</div>
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
                                                <th>Merk</th>
                                                <th>Foto</th>
                                                <th>Stock</th>
                                                <th class="text-center">Action</th>
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
                                                        <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('barang.show', $data->id) }}" class="btn btn-sm btn-warning">Show</a>
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
                                        <a href="{{ route('barang.create') }}" class="btn btn-sm btn-success">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Akhir Table --}}
    </div>
</div>

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

<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
