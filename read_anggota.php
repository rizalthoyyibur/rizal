<?php
include 'koneksi.php';
$sql = "SELECT * FROM anggota";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Email</th><th>Telepon</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["anggota_id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["alamat"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["telepon"] . "</td>";
        echo "<td><a href='update_anggota.php?id=" . $row["anggota_id"] . "'>Edit</a> | <a
href='delete.php?id=" . $row["anggota_id"] . "'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data buku.";
}

echo "<br><a href='create_anggota.php'>Tambah Anggota</a>";
echo "<br><a href='index.php'>Kembali</a>";

$mysqli->close();
?>