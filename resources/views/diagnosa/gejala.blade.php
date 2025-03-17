<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa Penyakit Tanaman Sawit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-diagnosa {
            background-color: #198754;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Diagnosa Penyakit Tanaman Sawit</h1>
            </div>
            <div class="card-body">
                <!-- Error Messages -->
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('diagnosa.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-3">Silakan pilih gejala yang Anda alami:</h5>
                    <div class="mb-3">
                        @forelse ($gejala as $item) <!-- Iterasi melalui data gejala -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gejala[]" value="{{ $item->id }}" id="gejala{{ $item->id }}">
                                <label class="form-check-label" for="gejala{{ $item->id }}">
                                    {{ $item->nama_gejala }}
                                </label>
                            </div>
                        @empty
                            <p class="text-danger">Tidak ada gejala tersedia.</p>
                        @endforelse
                    </div>
                    <button type="submit" class="btn btn-diagnosa">Diagnosa</button>
                </form>

                <!-- Menampilkan hasil diagnosis -->
                @if(isset($penyakitTerdiagnosis))
                    <hr>
                    <div class="alert alert-success mt-4">
                        <h4 class="alert-heading">Hasil Diagnosis</h4>
                        @foreach ($penyakitTerdiagnosis as $penyakit)
                            <p><strong>Penyakit:</strong> {{ $penyakit['penyakit'] }}</p>
                            <p><strong>Nilai CF:</strong> {{ number_format($penyakit['cf'], 2) }}%</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
