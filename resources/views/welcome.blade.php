<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Website Inventaris</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no"name="viewport"/>
    <link rel="icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link
    rel="icon"
    href="{{ asset('assets/images/logowhite.png') }}"
    type="image/x-icon"
  />

  <!-- Fonts and icons -->
  <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
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
          urls: ["{{ asset('assets/css/fonts.min.css') }}"],
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
              <div class="row">

                <!-- Data Petugas -->
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="icon-big text-center">
                            <i class="fas fa-address-card fa-2x"></i>
                          </div>
                        </div>
                        <div class="col-8 col-stats">
                          <div class="numbers">
                            <p class="card-category">Data Peminjaman</p>
                            <h4 class="card-title">{{ \App\Models\Peminjamans::count() }} Data</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- Data Barang -->
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-success card-round">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="icon-big text-center">
                            <i class="fas fa-dolly fa-2x"></i>
                          </div>
                        </div>
                        <div class="col-8 col-stats">
                          <div class="numbers">
                            <p class="card-category">Data Barang</p>
                            <h4 class="card-title">{{ \App\Models\DataPusats::count() }} Data</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- Barang Masuk -->
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-secondary card-round">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="icon-big text-center">
                            <i class="fas fa-long-arrow-alt-down fa-2x"></i>
                          </div>
                        </div>
                        <div class="col-8 col-stats">
                          <div class="numbers">
                            <p class="card-category">Barang Masuk</p>
                            <h4 class="card-title">{{ number_format(\App\Models\BarangMasuks::sum('jumlah')) }} Barang</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- Barang Keluar -->
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-warning card-round">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="icon-big text-center">
                            <i class="fas fa-long-arrow-alt-up fa-2x"></i>
                          </div>
                        </div>
                        <div class="col-8 col-stats">
                          <div class="numbers">
                            <p class="card-category">Barang Keluar</p>
                            <h4 class="card-title">{{ number_format(\App\Models\BarangKeluar::sum('jumlah')) }} Data</h4>
                          </div>
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
                      <div class="card-title">Statistik Barang Keluar Masuk</div>
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
            </div>
          </div>
        </div> 
      </div>
    </div>

    
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>
