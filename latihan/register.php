<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url(../asset/bg.png);
            background-size: 100%;
        }

        .wrapper {
            text-align: left;
            margin-left: 40%;
            margin-right: 40%;
            margin-top: 200px;
            background-color: rgba(255, 255, 255, 0.493);
            padding: 10px 10px 10px 10px;
            border-radius: 20px;
        }

        .Login-header {
            text-align: center;
        }

        .input_box {
            display: flex;
            justify-content: space-between;

        }

        .logo {
            text-align: center;
        }
    </style>
    <title>Registasi</title>
</head>

<body>
    <form class="login-form" action="proses_register.php" method="post">
        <div class="wrapper">
            <div class="logo">
                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/user-male--v1.png" alt="user-icon" />
            </div>
            <div class="login-box">
                <div class="login-header">
                    <span>Silahkan buat akun baru anda</span>
                </div>
                <br>
                <div class="input-box">
                    <input type="text" id="nma_lengkap" name="nama_lengkap" placeholder="Nama lengkap" class="input-field" required>
                    <i class="bx bx-user icon"></i>
                </div>
                <br>
                <div class="input-box">
                    <input type="text" id="username" name="username" placeholder="Username" class="input-field" required>
                    <i class="bx bx-user icon"></i>
                </div>
                <br>
                <div class="input-box">
                    <input type="text" id="notel" name="notel" placeholder="Nomor telepon" class="input-field" required>
                    <i class="bx bx-user icon"></i>
                </div>
                <br>
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                    <i class="bx bx-lock icon"></i>
                </div>
                <br>
                <div class="input-box">
                    <button name="submit" type="submit">Registasi</button>
                </div>
                <br>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_lengkap = $_POST['nama_lengkap'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $conn = new mysqli('localhost', 'root', '', 'ukk_db');

                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    $stmt = $conn->prepare("INSERT INTO user (nama_lengkap, username, password VALUES (?, ?, ?)");
                    if (!$stmt) {
                        die("Kesalahan pada prepare statement: " . $conn->error);
                    }

                    $stmt->bind_param("ss", $nama_lengkap, $username, $password);

                    if ($stmt->execute()) {
                        echo "Registrasi berhasil. Selamat datang, " . htmlspecialchars($nama_lengkap) . "!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                    $conn->close();
                } else {
                    echo "";
                }
                ?>
            </div>
        </div>
    </form>
</body>

</html>