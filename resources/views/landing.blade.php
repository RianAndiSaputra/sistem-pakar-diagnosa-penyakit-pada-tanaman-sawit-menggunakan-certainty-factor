<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Diagnosa Penyakit Sawit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/5.jpg') }}') no-repeat center center/cover;">
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .feature-card {
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        footer {
            background-color: #333;
            color: white;
        }
        /* CSS untuk card dan gambar seragam */
.feature-card {
    height: 100%; /* Membuat semua card memiliki tinggi yang sama */
}

.feature-card .card-body {
    padding: 1.5rem; /* Menambahkan padding untuk ruang lebih dalam card */
}

.feature-card img {
    width: 100%;
    height: 200px; /* Atur tinggi gambar yang seragam */
    object-fit: cover; /* Menjaga proporsi gambar */
    border-radius: 8px; /* Agar gambar memiliki sudut membulat */
}

.card {
    transition: box-shadow 0.3s ease; /* Menambahkan transisi efek shadow */
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Efek shadow saat hover */
}
/* CSS untuk gambar melengkung dan dengan efek shadow */
.img-fluid {
    border-radius: 15px; /* Menambahkan sudut membulat pada gambar */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan efek shadow */
    transition: box-shadow 0.3s ease; /* Menambahkan efek transisi saat hover */
}

.img-fluid:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efek shadow lebih besar saat hover */
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Pakar Sawit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/foto.png') }}" alt="Profile" width="40" height="40" class="rounded-circle">
                            <span class="ms-2">Rian,</span>
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

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container text-white">
            <h1 class="display-4 fw-bold">Selamat Datang di Sistem Pakar Diagnosa Penyakit Tanaman Sawit</h1>
            <p class="lead">Bantu tanaman sawit Anda tumbuh sehat dengan diagnosa cepat dan akurat.</p>
            <a href="{{ route('diagnosa.index') }}" class="btn btn-primary btn-lg mt-3">Mulai Diagnosa</a>
        </div>
    </div>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Utama</h2>
                <p class="text-muted">Berikut adalah fitur-fitur utama yang kami sediakan.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm border-0">
                        <div class="card-body text-center">
                            <img src="{{ asset('img/1.jpg') }}" alt="Header Image" class="img-fluid">
                            <h5 class="card-title">Diagnosa Akurat</h5>
                            <p class="card-text">Dapatkan hasil diagnosa yang akurat berdasarkan data gejala terkini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm border-0">
                        <div class="card-body text-center">
                            <img src="{{ asset('img/3.jpg') }}" alt="Header Image" class="img-fluid">
                            <h5 class="card-title">Kemudahan Penggunaan</h5>
                            <p class="card-text">Sistem dirancang dengan antarmuka yang ramah pengguna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm border-0">
                        <div class="card-body text-center">
                            <img src="{{ asset('img/4.jpg') }}" alt="Header Image" class="img-fluid">
                            <h5 class="card-title">Data Terkini</h5>
                            <p class="card-text">Sistem kami selalu diperbarui dengan informasi terbaru.</p>
                        </div>
                    </div>
                </div>
            </div>            
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold">Tentang Sistem Pakar</h2>
                    <p>Sistem Pakar Diagnosa Penyakit Tanaman Sawit adalah alat bantu untuk petani dan pemilik perkebunan sawit dalam mengidentifikasi penyakit pada tanaman mereka secara cepat dan tepat.</p>
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">Mulai Diagnosa</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/2.jpg') }}" alt="Header Image" class="img-fluid">
                </div>                
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container text-cent
