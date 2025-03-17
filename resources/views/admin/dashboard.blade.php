@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.dark-mode {
            background-color: #121212;
            color: #000000;
        }
        .dark-mode .navbar {
            background-color: #343a40;
        }
        .dark-mode .list-group-item {
            background-color: #2c2f36;
            color: #fff;
        }
        .dark-mode .card {
            background-color: #2c2f36;
            color: #ffffff;
        }
        .dark-mode .dropdown-menu {
            background-color: #333;
        }
        .dark-mode .dropdown-item {
            color: #ffffff;
        }

        /* Switch button styles */
        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked + .slider {
            background-color: #4CAF50;
        }

        input:checked + .slider:before {
            transform: translateX(14px);
        }
    </style>
</head>
<body>
    <div class="container-fluid my-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Sistem Pakar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form class="d-flex ms-auto me-3">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/foto.png') }}" alt="Profile" width="40" height="40" class="rounded-circle">
                            <span class="ms-2">Rian</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                    <!-- Script Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

                    <!-- Switch Button for Dark/Light Mode -->
                    <label class="switch">
                        <input type="checkbox" id="themeToggle">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </nav>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light min-vh-100 py-4">
                <div class="text-center mb-4">
                    {{-- <h4 class="fw-bold">VENUS</h4>
                    <small class="text-muted">DASHBOARD</small> --}}
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Admin Dashboard</a>
                    <a href="{{ route('admin.gejala.index') }}" class="list-group-item list-group-item-action">Kelola Gejala</a>
                    <a href="{{ route('admin.penyakit.index') }}" class="list-group-item list-group-item-action">Kelola Penyakit</a>
                    <a href="{{ route('admin.rules.index') }}" class="list-group-item list-group-item-action">Kelola Aturan</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h1 class="mb-4">Selamat Datang, Admin!</h1>
                <div class="row">
                    <!-- Card Cuaca -->
                  <!-- Card Cuaca Saat Ini -->
<div class="col-md-4 mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6 class="text-uppercase">Cuaca Saat Ini</h6>
            <h3 class="fw-bold">Cerah</h3>
            <p class="text-muted">25°C, Kelembapan 60%</p>
        </div>
    </div>
</div>

<!-- Card Waktu Saat Ini -->
<div class="col-md-4 mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6 class="text-uppercase">Waktu Saat Ini</h6>
            <h3 class="fw-bold">
                <span id="current-time"></span>
            </h3>
            <p class="text-muted">Zona Waktu: WIB</p>
        </div>
    </div>
</div>

<!-- Card Statistik Umum -->
<div class="col-md-4 mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold">Total Kasus Penyakit Sawit</h5>
            <h5 class="lead">Jumlah Kasus: 120</h5>
            <h5 class="lead">Kasus Aktif: 32</h5>
        </div>
    </div>
</div>
<!-- Card Grafik Penyebaran Penyakit -->
<div class="col-md-12 mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6 class="text-uppercase">Laporan Penyakit</h6>
            <h3 class="fw-bold">Penyebaran Penyakit Sawit</h3>
            <canvas id="locationChart" width="800" height="300"></canvas> <!-- Ukuran lebih kecil untuk landscape -->
        </div>
    </div>
</div>

<!-- Menambahkan Chart.js melalui CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pastikan skrip ini berada di bawah elemen canvas
    var ctx = document.getElementById('locationChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Jenis chart yang digunakan, misalnya bar chart
        data: {
            labels: ['Lokasi 1', 'Lokasi 2', 'Lokasi 3', 'Lokasi 4'],
            datasets: [{
                label: 'Jumlah Kasus Penyakit',
                data: [12, 19, 3, 5], // Data yang ditampilkan pada chart
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang batang
                borderColor: 'rgba(255, 99, 132, 1)', // Warna border batang
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Menyebabkan sumbu Y dimulai dari 0
                }
            }
        }
    });
</script>

<!-- Script untuk Waktu -->
<script>
    function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateTime, 1000);
    updateTime();
</script>

<!-- Script untuk Toggle Mode -->
<script>
    const themeToggleButton = document.getElementById('themeToggle');
    themeToggleButton.addEventListener('change', function() {
        document.body.classList.toggle('dark-mode');
    });
</script>

                
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
