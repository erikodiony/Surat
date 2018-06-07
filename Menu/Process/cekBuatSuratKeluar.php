<?php
	include('../../Scripts/connect.php');
	$no_agdK = mysql_real_escape_string($_POST['no_agdK']);	
	$no_urutk = mysql_real_escape_string($_POST['no_urutk']);
	$no_brks = mysql_real_escape_string($_POST['no_brks']);
	$no_suratk = mysql_real_escape_string($_POST['no_suratk']);
	$tgl_suratk = mysql_real_escape_string($_POST['tgl_suratk']);
	$kpd_srt = mysql_real_escape_string($_POST['kpd_srt']);
	$isi_srt = mysql_real_escape_string($_POST['isi_srt']);

			$qDup = mysql_query("SELECT * FROM `s_keluar` WHERE `no_agenda` = '".$no_agdK."'");
			$insert = "INSERT INTO `s_keluar` (`no_urut`, `no_berkas`, `no_agenda`,`tgl_suratk`,`srt_no`,`srt_ke`,`srt_perihal`) VALUES
			('".$no_urutk."','".$no_brks."','".$no_agdK."','".$tgl_suratk."','".$no_suratk."','".$kpd_srt."','".$isi_srt."')";
			$cek = mysql_num_rows($qDup);
		if($cek <= 0)
		{
			mysql_query($insert);
			echo '<script type="text/javascript">alert("./Data Berhasil disimpan! :)");window.location.href = "cekAutentikasi.php";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("./Data Gagal disimpan! No. Agenda Terdeteksi Terduplikasi, Cek Kembali No. Agenda Anda! :(");window.location.href = "cekAutentikasi.php";</script>';
		}
 ?>
