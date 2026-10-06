// CARA NYAMBUNGKAN KE DATABASE ----
// require_once("(nama file koneksi")) -- Intinya agar selalu terhubung ke database
// fetchAll() = ngambil seluruh data (baris & kolom), PDO::FETCH_ASSOC = ubah ke bentuk array associative (punya key/kolom dan value/baris)
// fetch() = ngambil 1 data tok
// $kueri = taroh query sql di sini (untuk CRUD sama kyk query SQLyog)
// $conn -> prepare (nyiapin query sbelum di execute (siapsiap nihhh))
// $conn -> bindParam (parameter/tumbal yang ditaruh pada $kueri dihubungkan dengan variabel yang ingin dimasukin ke kueri (variabel luar yang didapat dari frontend dsb)) -- intinya agar bisa interaksi antar frontend (input user) dan dimasukkan ke sql
// $conn -> execute() = kueri yang sudah disiapkan tadi di execute kemudian mengembalikan true/false kalau dipadukan dengan if maka kalau true masuk ke blok if tsb
// $res = buat menggunakan fetch/fetchAll pada kueri yang dihasilkan (mendapatkan key:value) kmudian dari $res ini bisa di foreach tiap barisnya agar bisa akses semua key:value dari kueri yang dihasilkan



// MASUK JQUERY DAN JSONNYA ----

