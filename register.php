<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pegawai</title>
    <script src="jquery.js"></script>
</head>
<body>
    NIP: <input type="text" name="edNIP" id="edNIP">
    <label id="errNIP" style="color: red;"></label>
    <br>
    Nama: <input type="text" name="edNama" id="edNama">
    <br>
    Alamat: <input type="text" name="edAlamat" id="edAlamat">
    <br>
    Departemen: <select name="cbDepartemen" id="cbDepartemen"> </select>
    <br>
    Cabang: <select name="cbCabang" id="cbCabang"></select>
    <br>
    <input type="button" value="Tambah" id="btnTambah">
    <br><br>
    <div class="wrapper"></div>

    <script>
        function reloadData(){
            $.post("pegawai.php", function(hasil){
                $(".wrapper").html(hasil);
            })
        }

        $(document).ready(function(){
            // load awal dropdown departemen
            $.post("departemen.php", function(hasil){
                $("#cbDepartemen").html(hasil);

                $("#cbDepartemen").trigger("change"); // supaya opsi cabang langsung muncul tanpa perlu merubah departemen dulu
            });

            // load awal tabel pegawai
            reloadData();

            // kalau departemen berubah, filter cabang
            $("#cbDepartemen").change(function(){
                kode = $(this).val();
                $.post("cabang.php", {parameternya: kode}, function(hasil){
                    $("#cbCabang").html(hasil);
                });
            });

            // validasi duplikat NIP saat blur
            $("#edNIP").blur(function(){
                kode = $(this).val();
                $.post("cekNIP.php", {nip: kode}, function(hasil){
                    $("#errNIP").html(hasil)
                });
            });

            // simpan data saat tombol tambah dipencet
            $("#btnTambah").click(function(){
                vNip = $("#edNIP").val();
                vNama = $("#edNama").val();
                vAlamat = $("#edAlamat").val();
                vDept = $("#cbDepartemen").val();
                vCabang = $("#cbCabang").val();

                mode = $(this).val(); // ambil value tombol: "Ubah" atau "Tambah"
                target = (mode == "Ubah") ? "update.php" : "simpan.php"; // kalau Ubah maka ke file update, kalo tambah ke simpan

                // kirim semua data ke halaman file sesuai target
                $.post(target, {
                    nip: vNip,
                    nama: vNama,
                    alamat: vAlamat,
                    departemen: vDept,
                    cabang: vCabang,
                }, function(hasil){
                    if(hasil == "sukses"){
                        reloadData();

                        // kosongkan input abis berhasil
                        $("#btnTambah").val("Tambah");
                        $("#edNIP").val("");
                        $("#edNama").val("");
                        $("#edAlamat").val("");
                        $("#errNIP").html("");     
                    } else {
                        alert("Gagal proses data: " + hasil);
                    }
                });
            });
        });
    </script>
</body>
</html>
