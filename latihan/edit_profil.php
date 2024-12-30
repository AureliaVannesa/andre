<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #555;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <?php
    // Ambil data dari file JSON
    $file = 'data_diri.json';
    $data_diri = file_exists($file) ? json_decode(file_get_contents($file), true) : [
        "Nama Lengkap" => "",
        "Tempat, Tanggal Lahir" => "",
        "Jenis Kelamin" => "",
        "Alamat" => "",
        "Email" => "",
        "Nomor Telepon" => "",
        "Hobi" => "",
        "Foto" => "ayy.jpg"
    ];

    // Jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update data dari form
        $data_diri = [
            "Nama Lengkap" => $_POST['nama_lengkap'],
            "Tempat, Tanggal Lahir" => $_POST['ttl'],
            "Jenis Kelamin" => $_POST['jenis_kelamin'],
            "Alamat" => $_POST['alamat'],
            "Email" => $_POST['email'],
            "Nomor Telepon" => $_POST['nomor_telepon'],
            "Hobi" => $_POST['hobi'],
            "Foto" => $_POST['foto']
        ];
        file_put_contents($file, json_encode($data_diri)); // Simpan data ke file
        header('Location: profile.php'); // Redirect ke halaman data_diri.php
        exit;
    }
    ?>
    <h1>Edit Profil</h1>
    <form method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($data_diri['Nama Lengkap']) ?>" required>

        <label>Tempat, Tanggal Lahir:</label>
        <input type="text" name="ttl" value="<?= htmlspecialchars($data_diri['Tempat, Tanggal Lahir']) ?>" required>

        <label>Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?= htmlspecialchars($data_diri['Jenis Kelamin']) ?>" required>

        <label>Alamat:</label>
        <textarea name="alamat" rows="3" required><?= htmlspecialchars($data_diri['Alamat']) ?></textarea>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data_diri['Email']) ?>" required>

        <label>Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" value="<?= htmlspecialchars($data_diri['Nomor Telepon']) ?>" required>

        <label>Hobi:</label>
        <textarea name="hobi" rows="3"><?= htmlspecialchars($data_diri['Hobi']) ?></textarea>

        <label>Foto (URL):</label>
        <input type="text" name="foto" value="<?= htmlspecialchars($data_diri['Foto']) ?>">

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>