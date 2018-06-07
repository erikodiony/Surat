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


	$no_agdMSeb = $_POST['hide_agd'];
    $qDup = mysql_query("SELECT * FROM `s_masuk` WHERE `no_agenda` = '".$no_agd."'");
    $update="UPDATE `s_masuk` SET `no_berkas`='".$no_brks."',`no_agenda`='".$no_agd."',`tgl_terima`='".$tgl_msk."',`isi_disposisi`='".$isi_dps."',`srt_no`='".$no_suratm."',`srt_tgl`='".$tgl_suratm."',`srt_dari`='".$dr_srt."',`srt_perihal`='".$isi_srt."' WHERE `no_urut` = '".$no_urutm."';";
	$cek = mysql_num_rows($qDup);
	$data = mysql_fetch_array($qDup);  
		if($cek <= 0)
		{
			mysql_query($update);
			echo '<script type="text/javascript">alert("./Data Berhasil disimpan! :)");window.location.href = "cekAutentikasi.php";</script>';
		}
		else
		{
			if($no_agdMSeb == $data['no_agenda'])
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

