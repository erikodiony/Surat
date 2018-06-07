<?php 
session_start();

if (!isset($_POST['idlogin']) && !isset($_POST['pwdlogin']) && !isset($_POST['level'])) {
	header('location:cekAutentikasi.php');
} else {
	include('../Scripts/connect.php');
	$idlgn = mysql_real_escape_string($_POST['idlogin']);
	$pwdlgn = mysql_real_escape_string($_POST['pwdlogin']);  
	$lvl = mysql_real_escape_string($_POST['level']);

	$query = "SELECT * FROM login WHERE user = '$idlgn' AND pass = '$pwdlgn'";
	$hasil = mysql_query($query); 
	$data = mysql_fetch_array($hasil);  
	if ($pwdlgn == $data['pass'] && $lvl == $data['level']) 
		{ 
		echo '<script type="text/javascript">alert("./Login Sukses! ^_^ \n./Klik OK untuk Masuk ke Menu Utama! :)");</script>';
		
		$_SESSION['level'] = $data['level'];     
		$_SESSION['user'] = $data['user'];  
		$_SESSION['pwdlgn'] = $data['pass'];
		echo '<script type="text/javascript">window.location.href = "cekAutentikasi.php";</script>';
		} 
	else 
	{	echo '<script type="text/javascript">alert("./Login Gagal! :( \n./Kombinasi Nama Pengguna / Kata Sandi / Hak Akses tidak Cocok! :(");</script>';
		echo '<meta http-equiv="refresh" content="0; url=../Login" />';
	}
}
?> 