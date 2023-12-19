<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>

    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f9e3cf;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            max-width: 400px;
            margin: 20px;
            padding: 20px;
            background-color: #d8a48f;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #654321;
            background-color: #f5f1e8;
        }

        form input[type="submit"] {
            background-color: #90552b;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        form input[type="submit"]:hover {
            background-color: #654321;
        }

        form input[type="hidden"] {
            display: none;
        }

        h2 {
            text-align: center;
            color: #90552b;
        }
    </style>
</head>

<body>
    <?php
    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $id = $_POST['id'];

        $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit' WHERE buku_id='$id'";

        if ($mysqli->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        $mysqli->close();
    }

    $id = $_GET['id']; // ID dari buku yang akan diupdate
    $sql = "SELECT * FROM buku WHERE buku_id=$id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h2>Update Data Buku</h2>
        <form action="update.php" method="POST">
            Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br>
            Pengarang: <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>"><br>
            Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"><br>
            Tahun Terbit: <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>"><br>
            <input type="hidden" name="id" value="<?php echo $row['buku_id']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "Data tidak ditemukan.";
    }
    $mysqli->close();
    ?>
</body>

</html>