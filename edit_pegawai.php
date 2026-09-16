<?php

include_once 'config/config.php';

$id= $_GET['id'] ?? null;

if(!$id){
    header('location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM pegawai WHERE id_pegawai = :id ");
$stmt->execute(['id' => $id]);
$pegawai = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$pegawai){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>

    <link rel="stylesheet" href="assets/css/style.css">

    
</head>

<body>

    <div class="container">

        <h2>Form Edit Data Pegawai</h2>
        
        <a href="index.php" class="btn-kembali">Kembali</a>

        <form action="update_pegawai.php" method="post">

            <input type="hidden" name="id" value="<?php echo $pegawai['id_pegawai'] ?>">

            <label for="namaLengkap">Nama Lengkap</label>
            <input type="text" id="namaLengkap" name="namalengkap" value="<?= htmlspecialchars($pegawai['nama']) ?>" required>

            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" value="<?=htmlspecialchars($pegawai['jabatan'])?>" required>

            <label for="gaji">Gaji</label>
            <input type="number" id="gaji" name="gaji" value="<?=htmlspecialchars($pegawai['gaji'])?>" required>

            <label for="aktif">Status Aktif</label>
            <select name="aktif" id="aktif">
                <option value="1" <?= $pegawai['aktif'] == 1 ? 'selected' : '' ?>>
                    Aktif
                </option>
                <option value="0" <?php echo $pegawai['aktif'] == 0 ? 'selected' : '' ?>>
                    Tidak Aktif
                </option>
            </select>



            <label for="tanggal_bergabung">Tanggal Bergabung</label>
            <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" value="<?=htmlspecialchars($pegawai['tanggal_bergabung'])?>" required>

            <button type="submit" name="simpan">
                Edit
            </button>

        </form>
</body>