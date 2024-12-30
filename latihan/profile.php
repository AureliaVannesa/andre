<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri</title>
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
            text-align: center;
        }
        h1 {
            color: #555;
        }
        img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 2px solid #ddd;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        td {
            padding: 8px 10px;
        }
        .label {
            font-weight: bold;
            text-align: left;
        }
        .btn-edit {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Ambil data dari file JSON
    $file = 'data_diri.json';
    $data_diri = file_exists($file) ? json_decode(file_get_contents($file), true) : [
        "Nama Lengkap" => "Andre Dio Firmansyah",
        "Tempat, Tanggal Lahir" => "Malang, 28 February 2007",
        "Jenis Kelamin" => "Laki-Laki",
        "Alamat" => "Jl. Wisanggeni. Mbunder Rt 10 rw 2",
        "Email" => "andredio205@gmail.com",
        "Nomor Telepon" => "+62 838 4380 6922",
        "Hobi" => "Voli, main motor",
        "Foto" => "ayy.jpg"
    ];
    ?>
    <h1>Foto Profil</h1>
    <img src="<?= htmlspecialchars($data_diri['Foto']) ?>" alt="Foto Diri">
    <table>
        <?php foreach ($data_diri as $label => $value): ?>
            <?php if ($label !== 'Foto'): ?>
                <tr>
                    <td class="label"><?= htmlspecialchars($label) ?></td>
                    <td><?= htmlspecialchars($value) ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <a class="btn-edit" href="edit_profil.php">Edit Profil</a>
</body>
</html>