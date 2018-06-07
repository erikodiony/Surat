<?php
	include('../../Scripts/connect.php');
	$user = mysql_real_escape_string($_GET['user']);
	$hapus = "DELETE FROM login WHERE user = '".$user."';";

mysql_query ($hapus);
echo '<script type="text/javascript">alert("./Akun User Berhasil diHapus! :)");window.location.href = "cekAutentikasi.php";</script>';
?>