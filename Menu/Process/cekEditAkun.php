<?php  
	include('../../Scripts/connect.php');
	$level = mysql_real_escape_string($_POST['level']);
	$pwdlogin = mysql_real_escape_string($_POST['pwdlogin']);
	$idlogin = mysql_real_escape_string($_POST['idlogin']);

    $update="UPDATE `login` SET `level`='".$level."',`pass`='".$pwdlogin."'
	WHERE `user` = '".$idlogin."';";
	
	mysql_query($update);
	echo '<script type="text/javascript">alert("./Data Berhasil Disimpan! :)");window.location.href = "cekAutentikasi.php";</script>';
?>

