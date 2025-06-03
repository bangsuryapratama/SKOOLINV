<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Data Barang Pengembalian</title>
    <style>
        /* Font DejaVu Sans supaya support UTF-8 */
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }

        h3 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            font-size: 12px;
        }

        thead tr {
            background-color: #3498db;
            color: white;
            text-align: center;
            font-weight: 600;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: center;
            white-space: normal;        /* supaya teks wrap */
            word-wrap: break-word;      /* pecah kata panjang */
            max-width: 120px;           /* batasi lebar tiap kolom */
        }

        tbody tr:nth-child(even) {
            background-color: #f7f9fc;
        }

        tbody tr:hover {
            background-color: #d6e9fb;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            color: white;
            font-weight: 600;
            font-size: 11px;
            display: inline-block;
        }

        .bg-danger {
            background-color: #e74c3c;
        }

        .bg-success {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

    <h3>Data Barang Pengembalian</h3>

    <table>
        <thead>
             <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Pengembalian</th>
                <th>Jumlah</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
       </thead>
       <tbody>
            @foreach ($pengembalian as $i => $data)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $data->barang->nama }}</td>
                <td>{{ $data->kode_barang }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->tglpinjam }}</td>
                <td>{{ $data->tglkembali }}</td>
                <td>
                    <span class="badge {{ $data->status == 'Sudah Dikembalikan' ? 'bg-success' : 'bg-success' }}">
                        {{ $data->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
