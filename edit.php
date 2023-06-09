<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webuas");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Memproses data yang dikirim dari form update
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Mengupdate data di database
    $query = "UPDATE badminton SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: dashboard.php"); // Redirect ke halaman dashboard setelah update berhasil
    } else {
        echo "Terjadi kesalahan saat mengupdate data.";
    }
}

// Mendapatkan data anggota berdasarkan ID
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM badminton WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
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
        <h2>Update Anggota</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="phone">Telepon:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" required><?php echo $row['address']; ?></textarea>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>

    <footer>
        <p>&copy; Badminton Club - We bring laughter to the court!</p>
    </footer>
</body>
</html>
