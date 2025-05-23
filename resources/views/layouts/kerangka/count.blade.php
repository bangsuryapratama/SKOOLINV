<div class="row">
              <div class="row">

                <!-- Data Peminjaman -->
                <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-danger bubble-shadow-small"
                        >
                          <i class="fas fa-book"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Peminjaman</p>
                          <h4 class="card-title">{{ \App\Models\Peminjamans::count() }} Peminjaman</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
                <!-- Data Barang -->
                <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Data Barang</p>
                          <h4 class="card-title">{{ \App\Models\DataPusats::count() }} Jenis Barang</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
                <!-- Barang Masuk -->
                   <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-long-arrow-alt-down"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Barang Masuk</p>
                          <h4 class="card-title">{{ number_format(\App\Models\BarangMasuks::sum('jumlah')) }} Barang Masuk</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
                <!-- Barang Keluar -->
                 <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-warning bubble-shadow-small"
                        >
                          <i class="fas fa-long-arrow-alt-up"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Barang Keluar</p>
                          <h4 class="card-title">{{ number_format(\App\Models\BarangKeluar::sum('jumlah')) }} Barang Keluar</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            