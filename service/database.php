<?php
    $hostname = "localhost";
    $username = "root"; // Username MySQL
    $password = "";     // Password MySQL
    $database_name = "buku_tamu";

    // Koneksi ke MySQL
    $db = mysqli_connect($hostname, $username, $password, $database_name);

    // Cek koneksi
    if (!$db) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    echo "Koneksi berhasil!";
?>
