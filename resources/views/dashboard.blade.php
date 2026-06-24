@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
/* BACKGROUND HALAMAN */
body {
    background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
}

/* GLASS CARD */
.glass-card {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}

/* ========================= */
/* 🔥 IMAGE GLASS EFFECT */
/* ========================= */

.image-glass-wrapper {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    height: 100%;
}

.image-glass {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.4s ease;
}

/* overlay glass */
.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,0.05); /* tipis aja */
    transition: 0.4s;
}

/* hover tetap hidup */
.image-glass-wrapper:hover .image-overlay {
    background: rgba(13, 110, 253, 0.1);
}

.image-glass-wrapper:hover .image-overlay {
    background: rgba(13, 110, 253, 0.15);
    backdrop-filter: blur(6px);
}


.stat-box {
    background: rgba(13, 110, 253, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 18px;
    transition: 0.3s;
}

.stat-box:hover {
    transform: translateY(-5px);
    background: rgba(13, 110, 253, 0.2);
}

.stat-box i {
    font-size: 22px;
    color: #0d6efd;
}

.stat-box h6 {
    font-weight: bold;
    margin: 5px 0;
    font-size: 16px;
}

.stat-box small {
    color: #555;
}

</style>

<div class="row g-4 align-items-stretch">

    {{-- KIRI --}}
    <div class="col-md-7">
        <div class="image-glass-wrapper">
            <img src="{{ asset('images/informatika.jpeg') }}" 
                 class="img-fluid image-glass"
                 alt="Universitas Suryakancana">

            <div class="image-overlay"></div>
        </div>
    </div>

    {{-- KANAN --}}
    <div class="col-md-5">
        <div class="glass-card h-100 p-3 d-flex flex-column">

            <div class="mb-2">
                <h5 class="text-primary fw-bold">Profil Prodi Teknik Informatika</h5>
            </div>

            <div class="flex-grow-1">
                <p>
                    Program Studi Teknik Informatika Universitas Suryakancana
                    mengembangkan mahasiswa agar menjadi pakar teknologi informasi
                    yang mampu bersaing di era digital.
                </p>

                <p>
                    Siap berkontribusi dalam pengembangan sistem informasi dan
                    digitalisasi menuju standar internasional.
                </p>

                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt-fill text-danger"></i> Lokasi: Cianjur</li>
                    <li><i class="bi bi-mortarboard-fill text-primary"></i> Fakultas: Teknik</li>
                    <li><i class="bi bi-patch-check-fill text-success"></i> Terakreditasi: B</li>

                    <hr>

                    <li><i class="bi bi-instagram text-danger"></i> @ft.unsur</li>
                    <li><i class="bi bi-envelope-fill text-warning"></i> info@ftunsur.ac.id</li>
                </ul>
            </div>

        </div>
    </div>

</div>

<!-- 🔥 STATISTIK -->
<div class="container mt-4">
    <div class="row g-3 text-center">

        <div class="col-md-4">
            <div class="stat-box">
                <i class="bi bi-people-fill"></i>
                <h6>1200+</h6>
                <small>Mahasiswa</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-box">
                <i class="bi bi-person-badge-fill"></i>
                <h6>45</h6>
                <small>Dosen</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-box">
                <i class="bi bi-journal-bookmark-fill"></i>
                <h6>60+</h6>
                <small>Mata Kuliah</small>
            </div>
        </div>

    </div>
</div>

@endsection