<div class="row">

  <!-- Data Peminjaman -->
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round shadow-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div
              class="icon-big text-center text-primary rounded-circle"
              style="background-color: rgba(13,110,253,0.15); padding: 15px;"
            >
              <i class="fas fa-book fa-2x"></i>
            </div>
          </div>
          <div class="col col-stats ms-3 ms-sm-0">
            <div class="numbers">
              <p class="card-category text-muted mb-1" style="font-size: 0.8rem;">Peminjaman</p>
              <h4 class="card-title" style="font-size: 1.2rem; font-weight: 700;">
                {{ number_format(\App\Models\Peminjamans::count()) }} Peminjaman
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Data Barang -->
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round shadow-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div
              class="icon-big text-center text-info rounded-circle"
              style="background-color: rgba(13,202,240,0.15); padding: 15px;"
            >
              <i class="fas fa-luggage-cart fa-2x"></i>
            </div>
          </div>
          <div class="col col-stats ms-3 ms-sm-0">
            <div class="numbers">
              <p class="card-category text-muted mb-1" style="font-size: 0.8rem;">Jenis Barang</p>
              <h4 class="card-title" style="font-size: 1.2rem; font-weight: 700;">
                {{ number_format(\App\Models\DataPusats::count()) }} Barang
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Barang Masuk -->
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round shadow-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div
              class="icon-big text-center text-success rounded-circle"
              style="background-color: rgba(25,135,84,0.15); padding: 15px;"
            >
              <i class="fas fa-arrow-circle-down fa-2x"></i>
            </div>
          </div>
          <div class="col col-stats ms-3 ms-sm-0">
            <div class="numbers">
              <p class="card-category text-muted mb-1" style="font-size: 0.8rem;">Barang Masuk</p>
              <h4 class="card-title" style="font-size: 1.2rem; font-weight: 700;">
                {{ number_format(\App\Models\BarangMasuks::sum('jumlah')) }} Barang Masuk
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Barang Keluar -->
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round shadow-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div
              class="icon-big text-center text-warning rounded-circle"
              style="background-color: rgba(255,193,7,0.15); padding: 15px;"
            >
              <i class="fas fa-arrow-circle-up fa-2x"></i>
            </div>
          </div>
          <div class="col col-stats ms-3 ms-sm-0">
            <div class="numbers">
              <p class="card-category text-muted mb-1" style="font-size: 0.8rem;">Barang Keluar</p>
              <h4 class="card-title" style="font-size: 1.2rem; font-weight: 700;">
                {{ number_format(\App\Models\BarangKeluar::sum('jumlah')) }} Barang Keluar
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
  