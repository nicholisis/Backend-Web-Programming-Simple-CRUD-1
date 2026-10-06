<?php
    require_once("koneksi.php");

    $kueri = "select nip from pegawai where nip = :param";

    $stmt = $conn->prepare($kueri);
    $stmt -> bindParam(":param", $_REQUEST["nip"]);

    if($stmt->execute()){
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($res){
            echo "DUPLICATE NIP!";
        }
    }
?>