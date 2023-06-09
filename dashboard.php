<?php
// Memeriksa apakah pengguna sudah login atau belum
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
}

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webuas");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Mendapatkan daftar anggota dari database
$query = "SELECT * FROM badminton";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Anggota Badminton</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            background-color: skyblue;
            font-family: Times New Roman, cursive;
            text-align: center;
        }

        h1 {
            color: pink;
        }

        nav ul li a {
            color: white;
        }

        .container {
            background-color: pink;
            border: 5px solid grey;
            padding: 20px;
            margin-top: 50px;
        }

        footer {
            background-color: white;
            color: black;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1><marquee behavior="scroll" direction="left">Form Pendaftaran Anggota Badminton</marquee></h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Daftar Anggota</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <footer>
        <p>&copy; Badminton Club - We bring laughter to the court!</p>
    </footer>
</body>
</html>
