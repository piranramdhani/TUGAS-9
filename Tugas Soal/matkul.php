<?php
include 'komponen/koneksi.php';
include 'komponen/header.php';
?>

<h2 class="mb-4 text-warning">Data Mata Kuliah</h2>
<table class="table table-striped table-hover border">
    <thead class="table-warning">
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>NIDN Pengampu</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT kodeMatkul, namMatkul, sks, nidn FROM tbl_matkul ORDER BY kodeMatkul ASC";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<tr><td colspan='4' class='text-center text-danger'>SQL ERROR: Gagal mengambil data Mata Kuliah. Pesan: " . mysqli_error($conn) . "</td></tr>";
        }
        if ($result && mysqli_num_rows($result) > 0) {
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["kodeMatkul"] . "</td>";
                echo "<td>" . $row["namMatkul"] . "</td>";
                echo "<td>" . $row["sks"] . "</td>";
                echo "<td>" . $row["nidn"] . "</td>";
                echo "</tr>";
            }
            mysqli_free_result($result); 
        } else {
            if ($result) {
                echo "<tr><td colspan='4' class='text-center'>Tidak ada data Mata Kuliah.</td></tr>";
            }
        }
        mysqli_close($conn); 
        ?>
    </tbody>
</table>
<div class="mt-3">
    <a href="index.php" class="btn btn-outline-warning">Kembali ke Dashboard</a>
</div>
