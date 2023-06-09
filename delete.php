<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webuas");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Menghapus data anggota berdasarkan ID
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM badminton WHERE id='$id'");

if ($result) {
    header("Location: dashboard.php"); // Redirect ke halaman dashboard setelah penghapusan berhasil
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
