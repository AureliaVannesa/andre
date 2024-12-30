<?php
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi input
    if (empty($nama_lengkap) || empty($username) || empty($password)) {
        header("Location: form_register.php?error=empty_fields");
        exit();
    }

    // Cek apakah username sudah ada
    $stmt = mysqli_prepare($db, "SELECT username FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Username sudah ada
        echo "username sudah ada";
        exit();
    }

    // Masukkan data ke database
    $stmt = mysqli_prepare($db, "INSERT INTO user (nama_lengkap, username, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama_lengkap, $username, $password);

    if (mysqli_stmt_execute($stmt)) {
        // Registrasi berhasil
        header("Location: acc.html");
        exit();
    } else {
        // Gagal menyimpan data
        header("Location: proses_register.php?error=registration_failed");
        exit();
    }
} else {
    echo "Metode request tidak valid.";
}
?>
