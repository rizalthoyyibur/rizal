<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            background-color: #f4f4f4;
        }

        header {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <?php
    include 'koneksi.php';
    session_start();

    // Logout functionality
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: login.php');
        exit();
    }

    // Check if user is already logged in
    if (isset($_SESSION['username'])) {
        echo '<center><header>Welcome, ' . $_SESSION['username'] . '!</header></center>';
        echo '<div style="text-align: center;"><a href="?logout">Logout</a></div>';
    } else {
        // Login functionality
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM users WHERE
            username = '$username' AND
            password = '$password'";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["username"] = $row["username"];
                header('Location: index.php');
                exit();
            } else {
                echo 'Username atau password salah.';
            }
        }
        ?>

        <center><header>Login</header></center>
        <form action="#" method="post">
            <label>Username</label><br>
            <input name="username" type="text"><br>
            <label>Password</label><br>
            <input name="password" type="password"><br>
            <button name="submit" class="btn">Login</button>
        </form>
    <?php
    }
    ?>
</body>

</html>
