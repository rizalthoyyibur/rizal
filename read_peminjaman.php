<?php
include 'koneksi.php';
$sql = "SELECT * FROM peminjaman";

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID Peminjaman</th><th>ID Buku</th><th>ID Anggota</th><th>Tanggal Peminjaman</th><th>Tanggal Kembali</th><th>Status</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["peminjaman_id"] . "</td>";
        echo "<td>" . $row["buku_id"] . "</td>";
        echo "<td>" . $row["anggota_id"] . "</td>";
        echo "<td>" . $row["tanggal_peminjaman"] . "</td>";
        echo "<td>" . $row["tanggal_kembali"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td><a href='update_peminjaman.php?id=" . $row["peminjaman_id"] . "'>Edit</a> | <a
href='delete.php?id=" . $row["peminjaman_id"] . "'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data buku.";
}

echo "<br><a href='create_peminjaman.php'>Tambah</a>";
echo "<br><a href='index.php'>Kembali</a>";

$mysqli->close();
?>