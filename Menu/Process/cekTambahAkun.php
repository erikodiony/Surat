<?php

    include('../../Scripts/connect.php');

    $foto_nama = $_FILES['ft']['name']; //nama file (tanpa path)
    $tmp_name  = $_FILES['ft']['tmp_name']; //nama local temp file di server
    $foto_ukuran = $_FILES['ft']['size']; //ukuran file (dalam bytes)
    $foto_tipe = $_FILES['ft']['type']; //tipe filenya (langsung detect MIMEnya)
    $fp = fopen($tmp_name, 'r'); // open file (read-only, binary)
    $foto_pegawai = fread($fp, $foto_ukuran) or die("Tidak dapat membaca source file"); // read file
    $foto_pegawai = mysql_real_escape_string($foto_pegawai) or die("Tidak dapat membaca source file"); // parse image ke string
    fclose($fp); // tuptup file

    /* query dan proses handling untuk melakukan insert ke database*/

$qu = "INSERT INTO `login`
                (`user`, `pass`, `level`,`foto`,`foto_nm`,`foto_tipe`,`foto_ukur`)
                VALUES
                ('$_POST[idlogin]','$_POST[pwdlogin]','$_POST[lvl]','$foto_pegawai','$foto_nama','$foto_tipe','$foto_ukuran')";
 $re = mysql_query($qu) or die 
 ("Gagal Menambah Akun, Hal ini dikarenakan Ukuran File Foto terlalu Besar! Silahkan ulangi kembali");
echo '<script type="text/javascript">alert("./Akun User Berhasil diBuat! :)");window.location.href = "cekAutentikasi.php";</script>';
 ?>
