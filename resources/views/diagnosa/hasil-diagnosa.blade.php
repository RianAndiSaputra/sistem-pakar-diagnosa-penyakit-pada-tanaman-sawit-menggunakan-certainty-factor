<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #76b852, #8dc26f);
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #76b852;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #76b852;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .back-button {
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 10px 20px;
            color: #fff;
            background-color: #76b852;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #5a9943;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hasil Diagnosa</h1>

        @if (!empty($penyakitTerdiagnosis))
            <table>
                <thead>
                    <tr>
                        <th>Penyakit</th>
                        <th>Keyakinan (%)</th>
                        <th>Deskripsi</th>
                        <th>Solusi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penyakitTerdiagnosis as $hasil)
                        <tr>
                            <td>{{ $hasil['penyakit'] }}</td>
                            <td>{{ $hasil['cf'] }}%</td>
                            <td>{{ $hasil['deskripsi'] }}</td>
                            <td>{{ $hasil['solusi'] }}</td>

                            {{-- <td>{{ isset($hasil['deskripsi']) ? $hasil['deskripsi'] : '' }}</td>
                            <td>{{ isset($hasil['solusi']) ? $hasil['solusi'] : '' }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center; color: red;">Tidak ada hasil diagnosa yang sesuai dengan gejala yang Anda pilih.</p>
        @endif

        <a href="{{ route('diagnosa.index') }}" class="back-button">Kembali</a>
    </div>
</body>
</html>
