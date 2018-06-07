<?php
	include('../../Scripts/connect.php');
	$no_urutk = mysql_real_escape_string($_GET['no_urutk']);
	
	$hapus="UPDATE `s_keluar` SET `no_berkas`=' ',`no_agenda`='0',`srt_no`=' ',`tgl_suratk`=' ',`srt_ke`=' ',`srt_perihal`=' '
	WHERE `no_urut` = '".$no_urutk."';";

mysql_query ($hapus);
echo '<script type="text/javascript">alert("./Data Berhasil diHapus! :)");window.location.href = "cekAutentikasi.php";</script>';
?>