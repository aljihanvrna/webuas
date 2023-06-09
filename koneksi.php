<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="webuas";

    $kon= mysql_connect($host,$username,$password,$database);

    if (!$kon){
        die("koneksi gagal:".mysql_connect_error());
    }else {
        echo "koneksi berhasil";
    }
?>