<?php
include 'komponen/koneksi.php';
include 'komponen/header.php';
?>
<h2 class="mb-4 text-danger">Rekap Data Nilai Mahasiswa</h2>
<table class="table table-striped table-hover border">
    <thead>
        <tr class="table-danger">
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai Angka</th>
            <th>Nilai Huruf</th>
            <th>Dosen Pengampu</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_connect_errno()) {
            echo "<tr><td colspan='7' class='text-center text-danger'>KONEKSI ERROR: " . mysqli_connect_error() . "</td></tr>";
        } else {
            $sql = "SELECT 
                        m.nim, 
                        m.nama AS nama_mahasiswa, 
                        mk.namMatkul, 
                        mk.sks, 
                        n.nilai, 
                        n.nilaiHuruf,
                        d.nama AS nama_dosen
                    FROM 
                        tbl_nilai n
                    JOIN 
                        tbl_mahasiswa m ON n.nim = m.nim
                    JOIN 
                        tbl_matkul mk ON n.kodeMatkul = mk.kodeMatkul
                    JOIN 
                        tbl_dosen d ON n.nidn = d.nidn 
                    ORDER BY 
                        m.nim, mk.namMatkul";
            $result = mysqli_query($conn, $sql);
            
            if (!$result) {
                echo "<tr><td colspan='7' class='text-center text-danger'>SQL ERROR: Gagal mengambil data nilai. Pesan: " . mysqli_error($conn) . "</td></tr>";
            }
            if ($result && mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["nim"] . "</td>";
                    echo "<td>" . $row["nama_mahasiswa"] . "</td>";
                    echo "<td>" . $row["namMatkul"] . "</td>";
                    echo "<td>" . $row["sks"] . "</td>";
                    echo "<td>" . number_format($row["nilai"], 2) . "</td>"; 
                    echo "<td>" . $row["nilaiHuruf"] . "</td>";
                    echo "<td>" . $row["nama_dosen"] . "</td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            } else {
                if ($result) {
                    echo "<tr><td colspan='7' class='text-center'>Tidak ada data nilai yang tercatat.</td></tr>";
                }
            }
            mysqli_close($conn); 
        }
        ?>
    </tbody>
</table>
<div class="mt-3">
    <a href="index.php" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
</div>
