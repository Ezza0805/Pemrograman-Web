<?php

require_once 'config/config.php';

if(isset($_POST['simpan'])){
    $id = $_POST['id'] ?? null;
    $nama = $_POST['namalengkap'];
    $jabatan = $_POST['jabatan'];
    $gaji= $_POST['gaji'] ?? 0;
    $tanggalbergabung = $_POST['tanggal_bergabung'];

    if(!$id){
        header(Location: index.php);
        exit;
    }

    $stmt = $pdo->prepare(
        "UPDATE pegawai 
        SET nama = :nama, 
            jabatan = :jabatan,
            gaji = :gaji,
            tanggal_bergabung = :tanggalbergabung
        WHERE id_pegawai = :id"
    );

    $stmt->execute([
        ':id' => $id,
        ':nama' => $nama,
        ':jabatan' => $jabatan,
        ':gaji' => $gaji,
        ':tanggalbergabung' => $tanggalbergabung
    ]);

    $_SESSION['flash_message'] = "Data pegawai berhasil update";
    $_SESSION['flash_message_type'] = "Succes";
    header("Location: index.php");
    exit;
}