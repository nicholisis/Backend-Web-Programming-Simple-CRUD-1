<?php
    require_once("koneksi.php");

    $kueri = "select * from pegawai";
    $stmt = $conn->prepare($kueri);

    if($stmt->execute()){
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table cellpadding='5' cellspacing='0' border='1'>";
        echo "<tr><th>NIP</th><th>NAMA</th><th>ALAMAT</th><th>DEPARTEMEN</th><th>CABANG</th><th>ACTION</th></tr>";
        foreach($res as $baris){
            echo "<tr>";
            echo "<td>" . $baris["nip"] . "</td>";
            echo "<td>" . $baris["nama"] . "</td>";
            echo "<td>" . $baris["alamat"] . "</td>";
            echo "<td>" . $baris["departemen"] . "</td>";
            echo "<td>" . $baris["cabang"] . "</td>";
            echo "<td>";
            echo "<input type='button' value='Del' titip='" . $baris["nip"]. "'>";
            echo "<input type='button' value='Edit' titip='" . $baris["nip"]. "'>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<script>
    $("document").ready(function(){

        // buat delete
        // cari semua inputan yang valuenya='Del' bisa lihat di inputan php di atas
        $("input[value='Del'").click(function(){  //.click kalau inputan(button) di click maka jalankan function di bawah (kek roblox)
            nip = $(this).attr("titip"); // $(this).attr("titip") ngambil value titip yang berisi $baris["nip"] 
            $.post("hapus.php", {nip: nip}, function(hasil){ //fungsi AJAX, post kirim ke hapus.php, hasil itu dari echo backend spt: sukses dsb
                reloadData();
            });
        });

        // buat edit
        $("input[value='Edit'").click(function(){ // cari semua inputan yang valuenya='Edit' bisa lihat di inputan php di atas
            nip = $(this).attr("titip"); // ambil nip dari tombol yang di klik
            
            $.post ("load.php", {nip: nip}, function(hasil){ // kirim ke load.php
                obj = JSON.parse(hasil); // hasil itu dari encode json di load.php
                // JSON.parse ngubah string json jadi objek js

                // masukkan semua data yang dipencet ke kotak inputan/select
                $("#edNIP").val(obj.nip);
                $("#edNama").val(obj.nama);
                $("#edAlamat").val(obj.alamat);
                $("#cbDepartment").val(obj.department);
                $("#cbCabang").val(obj.cabang);

                // ubah tombol tulisan tambah jadi ubah
                $("#btnTambah").val("Ubah");
            });
        });

    });

</script>