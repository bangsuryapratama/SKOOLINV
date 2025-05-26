<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Data Petugas</title>
    <style>
        /* Font DejaVu Sans supaya support UTF-8 */
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 20px;
        }

        h3 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        thead tr {
            background-color: #3498db;
            color: white;
            text-align: center;
            font-weight: 600;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px 12px;
        }

        tbody tr:nth-child(even) {
            background-color: #f7f9fc;
        }

        tbody tr:hover {
            background-color: #d6e9fb;
        }

        td {
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- <center>
               <img src="{{ $base64 }}" alt="Logo">
    </center> --}}
    <h3>Data Petugas</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
