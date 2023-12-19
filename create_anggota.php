<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $sql = "INSERT INTO anggota (nama, alamat, email, telepon) VALUES ('$nama',
'$alamat', '$email', '$telepon')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: read_anggota.php"); // Redirect ke tampilan Read setelah berhasil tambah data
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}
?>
<form action="create_anggota.php" method="POST">
    Nama: <input type="text" name="nama"><br>
    Alamat: <input type="text" name="alamat"><br>
    email: <input type="text" name="email"><br>
    telepon: <input type="text" name="telepon"><br>
    <input type="submit" value="Tambah">
</form>