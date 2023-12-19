<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $peminjaman_id = $_POST['peminjaman_id'];
    $buku_id = $_POST['buku_id'];
    $anggota_id = $_POST['anggota_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    $update_sql = "UPDATE peminjaman SET 
                   buku_id = '$buku_id', 
                   anggota_id = '$anggota_id', 
                   tanggal_peminjaman = '$tanggal_peminjaman', 
                   tanggal_kembali = '$tanggal_kembali', 
                   status = '$status' 
                   WHERE peminjaman_id = $peminjaman_id";

    if ($mysqli->query($update_sql) === TRUE) {
        echo "Data berhasil diupdate.";
        header("Location: read_peminjaman.php");
        exit();
    } else {
        echo "Error: " . $update_sql . "<br>" . $mysqli->error;
    }
}

// Display the form
if (isset($_GET['id'])) {
    $peminjaman_id = $_GET['id'];

    $sql = "SELECT * FROM peminjaman WHERE peminjaman_id = $peminjaman_id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Form update
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='peminjaman_id' value='" . $row["peminjaman_id"] . "'>";
        echo "ID Buku: <input type='text' name='buku_id' value='" . $row["buku_id"] . "'><br>";
        echo "ID Anggota: <input type='text' name='anggota_id' value='" . $row["anggota_id"] . "'><br>";
        echo "Tanggal Peminjaman: <input type='text' name='tanggal_peminjaman' value='" . $row["tanggal_peminjaman"] . "'><br>";
        echo "Tanggal Kembali: <input type='text' name='tanggal_kembali' value='" . $row["tanggal_kembali"] . "'><br>";
        echo "Status: <input type='text' name='status' value='" . $row["status"] . "'><br>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Peminjaman tidak ditemukan.";
    }
} else {
    echo "ID Peminjaman tidak valid.";
}

echo "<br><a href='index.php'>Kembali</a>";

$mysqli->close();
?>

</body>

</html>
