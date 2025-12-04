<?php 
include 'komponen/koneksi.php';
include 'komponen/header.php';
?>
<h2 class="mb-4 text-primary">Data Mahasiswa</h2>
<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT nim, nama, prodi, email FROM tbl_mahasiswa WHERE nim > 110 ORDER BY nim ASC";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["nim"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["prodi"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            mysqli_free_result($result); 
        } else {
            echo "<tr><td colspan='4' class='text-center'>Tidak ada data mahasiswa.</td></tr>";
        }
        ?>
    </tbody>
</table>
<div class="mt-3">
    <a href="nilai.php" class="btn btn-outline-success">Lihat Data Nilai</a>
</div>
