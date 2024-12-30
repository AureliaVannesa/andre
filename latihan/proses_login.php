<?php
include("koneksi.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($db, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $jumlah = mysqli_num_rows($result);
    if ($jumlah > 0) {
        header('Location: profile.php');
        exit(); 
    } else {
       echo "Username atau Password Salah";
        exit();
    }
} else {
    echo 'Username dan password harus diisi';
}
?>
