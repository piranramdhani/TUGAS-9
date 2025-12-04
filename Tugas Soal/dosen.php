<?php
// dosen.php - Gaya Prosedural (Perbaikan Nama Tabel)

// CATATAN: Pastikan komponen/koneksi.php menggunakan mysqli_connect()
include 'komponen/koneksi.php';
include 'komponen/header.php';
?>

<h2 class="mb-4 text-success">Data Dosen/Pengajar</h2>
<table class="table table-bordered table-hover">
    <thead class="table-success">
        <tr>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Prodi</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT nidn, nama, prodi, email FROM tbl_dosen ORDER BY nidn ASC"; 
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<tr><td colspan='4' class='text-center text-danger'>SQL ERROR: Gagal mengambil data dosen. Pesan: " . mysqli_error($conn) . "</td></tr>";
        }
        if ($result && mysqli_num_rows($result) > 0) {
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["nidn"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["prodi"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            mysqli_free_result($result); 
        } else {
            if ($result) {
                echo "<tr><td colspan='4' class='text-center'>Tidak ada data dosen.</td></tr>";
            }
        }
        mysqli_close($conn); 
        ?>
    </tbody>
</table>
<div class="mt-3">
    <a href="index.php" class="btn btn-outline-primary">Kembali ke Dashboard</a>
</div>