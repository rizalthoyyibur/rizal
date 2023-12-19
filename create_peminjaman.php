<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST['buku_id'];
    $anggota_id = $_POST['anggota_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];
    $sql = "INSERT INTO peminjaman ( buku_id, anggota_id, tanggal_peminjaman, tanggal_kembali, status) VALUES ('$buku_id', '$anggota_id', '$tanggal_peminjaman', '$tanggal_kembali', '$status')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: read_peminjaman.php"); // Redirect ke tampilan Read setelah berhasil tambah data
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}
?>
<form action="create_peminjaman.php" method="POST">
    ID Buku: <input type="text" name="buku_id"><br>
    ID Anggota: <input type="text" name="anggota_id"><br>
    Tanggal Peminjaman: <input type="date" name="tanggal_peminjaman"><br>
    Tanggal Kembali: <input type="date" name="tanggal_kembali"><br>
    <label for="status">Status:</label>
    <select name="status">
        <option value="Dipinjam">Dipinjam</option>
        <option value="Kembali">Kembali</option>
    </select><br>
    <input type="submit" value="Tambah">
</form>