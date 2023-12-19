<?php
include 'koneksi.php';
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .dashboard-container {
        display: flex;
    }

    .sidebar {
        background-color: #333;
        color: #fff;
        width: 200px;
        height: 100vh;
    }

    .sidebar ul {
        list-style: none;
        padding: 20px;
    }

    .sidebar li {
        margin-bottom: 10px;
    }

    .sidebar a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }

    .sidebar a:hover {
        color: #ffd700;
    }

    .main-content {
        flex: 1;
        padding: 20px;
    }

    header {
        background-color: #555;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .content {
        margin-top: 20px;
    }
</style>

<body>

    <div class="dashboard-container">

        <!-- Sidebar/Menu -->
        <nav class="sidebar">
            <ul>
                <li><a href="read.php">Daftar Buku</a></li>
                <li><a href="read_anggota.php">Anggota</a></li>
                <li><a href="read_peminjaman.php">Data Peminjaman</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Sistem Informasi Perpustakaan</h1>
            </header>

            <section class="content">
                <!-- Konten dari menu yang dipilih akan ditampilkan di sini -->
                <p>Selamat datang di Halaman Utama Sistem. Silakan pilih menu di samping.</p>
            </section>
        </div>

    </div>

</body>

</html>