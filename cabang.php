<?php
    require_once("koneksi.php");

    $kode = $_REQUEST("parameternya");

    $kueri = "select cabang_kode, cabang_nama from cabang where dept_kode = :param";

    $stmt = $conn -> prepare($kueri);

    $stmt -> bindParam(":param", $kode);

    if($stmt->execute()){
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($res as $baris){
            echo "<option value='" . $baris["cabang_kode"] . "'>" . $baris["cabang_nama"] . "</option>";
        }
    }
?>

