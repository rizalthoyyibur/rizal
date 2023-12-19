<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Anggota</title>
</head>

<body>

<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $anggota_id = $_POST['anggota_id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $update_sql = "UPDATE anggota SET 
                   nama = '$nama', 
                   alamat = '$alamat', 
                   email = '$email', 
                   telepon = '$telepon' 
                   WHERE anggota_id = $anggota_id";

    if ($mysqli->query($update_sql) === TRUE) {
        echo "Data berhasil diupdate.";
        header("Location: read_anggota.php");
        exit();
    } else {
        echo "Error: " . $update_sql . "<br>" . $mysqli->error;
    }
}

// Display the form
if (isset($_GET['id'])) {
    $anggota_id = $_GET['id'];

    $sql = "SELECT * FROM anggota WHERE anggota_id = $anggota_id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Form update
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='anggota_id' value='" . $row["anggota_id"] . "'>";
        echo "Nama: <input type='text' name='nama' value='" . $row["nama"] . "'><br>";
        echo "Alamat: <input type='text' name='alamat' value='" . $row["alamat"] . "'><br>";
        echo "Email: <input type='text' name='email' value='" . $row["email"] . "'><br>";
        echo "Telepon: <input type='text' name='telepon' value='" . $row["telepon"] . "'><br>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Anggota tidak ditemukan.";
    }
} else {
    echo "ID Anggota tidak valid.";
}

echo "<br><a href='index.php'>Kembali</a>";

$mysqli->close();
?>

</body>

</html>
