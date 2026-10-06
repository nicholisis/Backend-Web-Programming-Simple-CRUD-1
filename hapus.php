<?php
    require_once("koneksi.php");

    $kueri = "delete from pegawai where nip=:param";

    $stmt = $conn -> prepare($kueri);
    $stmt -> bindParam(":param", $_REQUEST["nip"]);

    if($stmt->execute()){
        echo "BERHASIL MENGHAPUS";
    }
?>