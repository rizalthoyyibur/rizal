<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

    <style>
        body {
            font-family: 'Gothic', sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        header {
            text-align: center;
            background-color: #d35400;
            padding: 10px;
            color: #fff;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #34495e;
            color: #ecf0f1;
        }

        th, td {
            border: 1px solid #2c3e50;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e74c3c;
            color: #fff;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #c0392b;
        }

        .center {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <header>
        <h1>PERPUSTAKAAN</h1>
    </header>

    <?php
    include 'koneksi.php';
    $sql = "SELECT * FROM buku";
    $result = $mysqli->query($sql);
    ?>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["buku_id"] . "</td>";
            echo "<td>" . $row["judul"] . "</td>";
            echo "<td>" . $row["pengarang"] . "</td>";
            echo "<td>" . $row["penerbit"] . "</td>";
            echo "<td>" . $row["tahun_terbit"] . "</td>";
            echo "<td><a href='update.php?id=" . $row["buku_id"] . "'>Edit</a> | <a 
            href='delete.php?id=" . $row["buku_id"] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='center'>Tidak ada data buku.</p>";
    }
    $mysqli->close();
    ?>

    <div class="center">
        <br>
        <a href="create.php">Tambah Judul Buku</a>
        <a href="index.php">Kembali</a>
    </div>
    <!-- Add this button at the end of your read.php file -->

<div style="text-align: center; margin-top: 20px;">
    <a href="login.php?logout">Logout</a>
</div>


</body>

</html>
