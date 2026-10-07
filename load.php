<?php
    require_once("koneksi.php");

    $kueri = "select * from pegawai where nip=:param";

    $stmt = $conn -> prepare($kueri);
    $stmt -> bindParam(":param", $_REQUEST["nip"]);

    if($stmt->execute()){
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($res);
    }
?>
