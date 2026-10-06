<?php
    require_once("koneksi.php");

    $kueri = "insert into pegawai(nip, nama, alamat, departemen, cabang) values (:p1, :p2, :p3, :p4, :p5)";

    $stmt = $conn->prepare($kueri);
    $stmt -> bindParam(":p1", $_REQUEST["nip"]);
    $stmt -> bindParam(":p2", $_REQUEST["nama"]);
    $stmt -> bindParam(":p3", $_REQUEST["alamat"]);
    $stmt -> bindParam(":p4", $_REQUEST["departemen"]);
    $stmt -> bindParam(":p5", $_REQUEST["cabang"]);
    
    if($stmt->execute()){
        echo "BERHASIL MENAMBAHKAN";
    }
?>