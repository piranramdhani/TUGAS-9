<?php
// index.php - Tambahan Modul Matkul

include 'komponen/koneksi.php';
include 'komponen/header.php';
?>
<h3 class="text-center mb-4">Tugas 9</h3>
<div class="row row-cols-1 row-cols-md-4 g-4"> 
    
    <div class="col">
        <div class="card text-center h-100 shadow border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-user-graduate me-2"></i>Mahasiswa</h5>
                <p class="card-text">Daftar data diri Mahasiswa.</p>
                <a href="mahasiswa.php" class="btn btn-primary">Lihat Data</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-center h-100 shadow border-success">
            <div class="card-body">
                <h5 class="card-title text-success"><i class="fas fa-chalkboard-teacher me-2"></i>Dosen</h5>
                <p class="card-text">Daftar dosen pengajar.</p>
                <a href="dosen.php" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-center h-100 shadow border-warning">
            <div class="card-body">
                <h5 class="card-title text-warning"><i class="fas fa-book me-2"></i>Mata Kuliah</h5>
                <p class="card-text">Daftar mata kuliah.</p>
                <a href="matkul.php" class="btn btn-warning">Lihat Data</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-center h-100 shadow border-danger">
            <div class="card-body">
                <h5 class="card-title text-danger"><i class="fas fa-poll-h me-2"></i>Rekap Nilai</h5>
                <p class="card-text">Laporan nilai mahasiswa.</p>
                <a href="nilai.php" class="btn btn-danger">Lihat Data</a>
            </div>
        </div>
    </div>

</div>
