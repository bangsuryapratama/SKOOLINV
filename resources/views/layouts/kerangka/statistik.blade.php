<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
    <!-- Statistik Barang Chart -->
    <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0">
                <h5 class="mb-0 text-dark fw-semibold">
                    <i class="fas fa-chart-bar text-primary me-2"></i> Statistik Barang
                </h5>
                <small class="text-muted">Update terakhir: {{ date('d M Y, H:i') }}</small>
            </div>
            <div class="card-body">
                <canvas id="statisticsChart" height="150"></canvas>
            </div>
        </div>
    </div>

    <!-- Sidebar: List Barang -->
    <div class="col-md-4">
        <!-- Barang Teratas -->
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0">
                <h6 class="mb-0 text-dark fw-semibold">
                    <i class="fas fa-chart-line text-primary me-2"></i> Barang Teratas
                </h6>
            </div>
            <div class="card-body pb-0">
                <ul class="list-group list-group-flush">
                    @php
                        $barangs = \App\Models\DataPusats::where('stok', '>', 5)->orderBy('stok')->take(3)->get();
                    @endphp
                    @forelse($barangs as $data)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $data->nama }}
                            <span class="badge bg-primary rounded-pill">{{ $data->stok }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Tidak ada data</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Stok Menipis -->
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0">
                <h6 class="mb-0 text-dark fw-semibold">
                    <i class="fas fa-hourglass-half text-warning me-2"></i> Stok Menipis
                </h6>
            </div>
            <div class="card-body pb-0">
                <ul class="list-group list-group-flush">
                    @php
                        $barangs = \App\Models\DataPusats::where('stok', '>=', 1)->where('stok', '<', 5)->orderBy('stok')->take(5)->get();
                    @endphp
                    @forelse($barangs as $data)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $data->nama }}
                            <span class="badge bg-warning text-dark rounded-pill">{{ $data->stok }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Tidak ada data</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Stok Habis -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0">
                <h6 class="mb-0 text-dark fw-semibold">
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i> Stok Habis
                </h6>
            </div>
            <div class="card-body pb-0">
                <ul class="list-group list-group-flush">
                    @php
                        $barangs = \App\Models\DataPusats::where('stok', '<', 1)->orderBy('stok')->take(5)->get();
                    @endphp
                    @forelse($barangs as $data)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $data->nama }}
                            <span class="badge bg-danger rounded-pill">{{ $data->stok }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Tidak ada data</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>


@php
$barangMasuk = \App\Models\BarangMasuks::sum('jumlah');
$barangKeluar = \App\Models\BarangKeluar::sum('jumlah');
$barangDipinjam = \App\Models\Peminjamans::sum('jumlah');
$barangTotal = \App\Models\DataPusats::count();
@endphp
<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('statisticsChart').getContext('2d');
    var statisticsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Barang Dipinjam', 'Jenis Barang Terdata', 'Barang Masuk', 'Barang Keluar'],
            datasets: [{
                label: 'Jumlah',
                data: [
                    {{ $barangDipinjam }},
                    {{ $barangTotal }},
                    {{ $barangMasuk }},
                    {{ $barangKeluar }}
                ],
                backgroundColor: [
                    '#495057', // Abu-abu gelap
                    '#1f2d3d', // Biru gelap
                    '#5e60ce', // Ungu tua
                    '#ced4da'  // Abu terang
                ],
                borderColor: [
                    '#343a40',
                    '#1f2d3d',
                    '#4c4cce',
                    '#adb5bd'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#343a40',
                    titleColor: '#ffffff',
                    bodyColor: '#dee2e6',
                    borderColor: '#adb5bd',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#343a40'
                    },
                    grid: {
                        color: '#dee2e6'
                    }
                },
                x: {
                    ticks: {
                        color: '#343a40'
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>

