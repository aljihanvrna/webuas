<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webuas");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Memproses data yang dikirim dari form login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengecek kecocokan username dan password di database
    $query = "SELECT * FROM badminton WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Login berhasil
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect ke halaman dashboard setelah login berhasil
    } else {
        echo "Username atau password salah.";
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>
