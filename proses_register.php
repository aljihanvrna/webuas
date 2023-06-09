<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webuas");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Memproses data yang dikirim dari form pendaftaran
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Menyimpan data ke database
    $query = "INSERT INTO badminton (username, password, name, email, phone, address, created_at) VALUES ('$username', '$password', '$name', '$email', '$phone', '$address', NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: login.php"); // Redirect ke halaman login setelah pendaftaran berhasil
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>
