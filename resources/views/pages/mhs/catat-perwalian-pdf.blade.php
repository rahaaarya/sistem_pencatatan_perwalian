<!-- Layout untuk PDF -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pencatatan Perwalian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-height: 100px; /* Ukuran logo */
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Bagian Header -->
    <div class="header">
        <img src="{{ public_path('img/logo-header-new.png') }}" alt="Logo Kampus"> <!-- Pastikan gambar logo ada -->
        <h2>Pencatatan Perwalian</h2>
    </div>

    <!-- Bagian Informasi Pengguna -->
    <div>
        <strong>Nama:</strong> {{ Auth::user()->name }}<br>
      
    </div>

    <!-- Tabel Mata Kuliah -->
    <h3>Daftar Mata Kuliah</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($mataKuliah as $mk)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $mk->kode }}</td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->sks }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><strong>Total SKS:</strong></td>
                <td>{{ $totalSKS }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
