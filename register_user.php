<?php
require_once "dashboard.php";
$db = new DB();
$db->connect();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($db->con, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($query) > 0) {
    header("location: register.php?error=username_taken");
    exit();
}

$insertQuery = mysqli_query($db->con, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

if ($insertQuery) {
    header("location: login.php?success=registration_successful");
    exit();
} else {
    header("location: register.php?error=registration_failed");
    exit();
}

$db->disconnect();
?>