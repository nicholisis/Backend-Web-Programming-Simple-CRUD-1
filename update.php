<?php
    require_once("koneksi.php");
    $kueri = "update pegawai set nama=:p2, alamat=:p3, departemen=:p4, cabang=:p5 where nip=:p1";

    $stmt = $conn->prepare($kueri);
    $stmt -> bindParam(":p1", $_REQUEST["nip"]);
    $stmt -> bindParam(":p2", $_REQUEST["nama"]);
    $stmt -> bindParam(":p3", $_REQUEST["alamat"]);
    $stmt -> bindParam(":p4", $_REQUEST["departemen"]);
    $stmt -> bindParam(":p5", $_REQUEST["cabang"]);

    if($stmt->execute()){
        echo "sukses";
    }
?>
