<?php
	include('../../Scripts/connect.php');
	$no_urutm = mysql_real_escape_string($_GET['no_urutm']);
	
	$hapus="UPDATE `s_masuk` SET `no_berkas`=' ',`no_agenda`='0',`tgl_terima`=' ',`isi_disposisi`=' ',`srt_no`=' ',`srt_tgl`=' ',`srt_dari`=' ',`srt_perihal`=' '
	WHERE `no_urut` = '".$no_urutm."';";

mysql_query ($hapus);
echo '<script type="text/javascript">alert("./Data Berhasil diHapus! :)");window.location.href = "cekAutentikasi.php";</script>';
?>