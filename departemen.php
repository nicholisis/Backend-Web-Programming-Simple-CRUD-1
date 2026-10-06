<?php
    require_once("koneksi.php");

    $kueri = "select dept_kode, dept_nama from departemen";
    $stmt = $conn -> prepare($kueri);

    if($stmt->execute()){
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($res as $baris){
            echo "<option value='" . $baris["dept_kode"] . "'>" . $baris["dept_nama"] . "</option>";
        }
    }
?>

