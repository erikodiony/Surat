<?php  
	include('../../Scripts/connect.php');

	$no_agdK = mysql_real_escape_string($_POST['no_agdK']);	
	$no_urutk = mysql_real_escape_string($_POST['no_urutk']);
	$no_brks = mysql_real_escape_string($_POST['no_brks']);
	$no_suratk = mysql_real_escape_string($_POST['no_suratk']);
	$tgl_suratk = mysql_real_escape_string($_POST['tgl_suratk']);
	$kpd_srt = mysql_real_escape_string($_POST['kpd_srt']);
	$isi_srt = mysql_real_escape_string($_POST['isi_srt']);

	$no_agdKSeb = mysql_real_escape_string($_POST['hide_agd']);
    $qDup = mysql_query("SELECT * FROM `s_keluar` WHERE `no_agenda` = '".$no_agdK."'");
    $update="UPDATE `s_keluar` SET `no_berkas`='".$no_brks."',`no_agenda`='".$no_agdK."',`tgl_suratk`='".$tgl_suratk."',`srt_no`='".$no_suratk."',`srt_ke`='".$kpd_srt."',`srt_perihal`='".$isi_srt."'
	WHERE `no_urut` = '".$no_urutk."';";
	$cek = mysql_num_rows($qDup);
	$data = mysql_fetch_array($qDup);  
		if($cek <= 0)
		{
			mysql_query($update);
			echo '<script type="text/javascript">alert("./Data Berhasil disimpan! :)");window.location.href = "cekAutentikasi.php";</script>';
		}
		else
		{
			if($no_agdKSeb == $data['no_agenda'])
			{
				mysql_query($update);
				echo '<script type="text/javascript">alert("./Data Berhasil disimpan! :)");window.location.href = "cekAutentikasi.php";</script>';
			}
			else 
			{
				echo '<script type="text/javascript">alert("./Data Gagal disimpan! No. Agenda Terdeteksi Terduplikasi, Cek Kembali No. Agenda Anda! :(");window.location.href = "cekAutentikasi.php";</script>';
			}
		}
?>

