<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Website Inventaris</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no"name="viewport"/>
    <link rel="icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('frontend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('frontend/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('frontend/css/demo.css') }}" />
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
              <h4 class="page-title">Dashboard</h4>   
            </div>
            <div class="page-category">Inventaris Website</div>

            <div class="row">

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-address-card"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Data Petugas</p>
                          <h4 class="card-title">{{ \App\Models\User::where('email', '!=', 'admin@gmail.com')->count() }} Data</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fas fa-dolly"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Data Barang</p>
                            <h4 class="card-title">{{ \App\Models\DataPusats::count() }} Data</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-warning card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-long-arrow-alt-up"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Barang Keluar</p>
                          <h4 class="card-title">{{ \App\Models\BarangKeluar::count() }} Data</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-long-arrow-alt-down"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Barang Masuk</p>
                          <h4 class="card-title">{{ \App\Models\BarangMasuks::count() }} Data</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
            </div>

             <div class="row">
              <div class="col-md-8">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">User Statistics</div>
                      <div class="card-tools">
                        <a
                          href="#"
                          class="btn btn-label-success btn-round btn-sm me-2"
                        >
                          <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                          </span>
                          Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                          <span class="btn-label">
                            <i class="fa fa-print"></i>
                          </span>
                          Print
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                      <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-primary card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Daily Sales</div>
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-sm btn-label-light dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            Export
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-category">March 25 - April 02</div>
                  </div>
                  <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                      <h1>$4,578.58</h1>
                    </div>
                    <div class="pull-in">
                      <canvas id="dailySalesChart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="card card-round">
                  <div class="card-body pb-0">
                    <div class="h1 fw-bold float-end text-primary">+5%</div>
                    <h2 class="mb-2">17</h2>
                    <p class="text-muted">Users online</p>
                    <div class="pull-in sparkline-fix">
                      <div id="lineChart"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div> 
      </div>
    </div>

    
    <!--   Core JS Files   -->
    <script src="{{ asset('frontend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="{{ asset('frontend/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('frontend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('frontend/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('frontend/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('frontend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('frontend/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('frontend/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('frontend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('frontend/js/kaiadmin.min.js') }}"></script>
  </body>
</html>
