<?php
	include('../../Scripts/connect.php');
	$no_agd = mysql_real_escape_string($_POST['no_agd']);	
	$no_urutm = mysql_real_escape_string($_POST['no_urutm']);
	$no_brks = mysql_real_escape_string($_POST['no_brks']);
	$no_suratm = mysql_real_escape_string($_POST['no_suratm']);
	$tgl_suratm = mysql_real_escape_string($_POST['tgl_suratm']);
	$dr_srt = mysql_real_escape_string($_POST['dr_srt']);
	$isi_srt = mysql_real_escape_string($_POST['isi_srt']);
	$tgl_msk = mysql_real_escape_string($_POST['tgl_msk']);
	$isi_dps = mysql_real_escape_string($_POST['isi_dps']);

		$qDup = mysql_query("SELECT * FROM `s_masuk` WHERE `no_agenda` = '".$no_agd."'");
		$insert = "INSERT INTO `s_masuk` (`no_urut`, `no_berkas`, `no_agenda`,`tgl_terima`,`isi_disposisi`,`srt_no`,`srt_tgl`,`srt_dari`,`srt_perihal`) VALUES
			('".$no_urutm."','".$no_brks."','".$no_agd."','".$tgl_msk."','".$isi_dps."','".$no_suratm."','".$tgl_suratm."','".$dr_srt."','".$isi_srt."')";
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
