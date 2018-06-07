<?php  
		$usr = $_GET['user'];  // id yang gambarnya mo ditampilkakn
		include('../Scripts/connect.php');
		$sqlTampil="SELECT * FROM login WHERE `user`='$usr'";  
		$qryTampil=mysql_query($sqlTampil); 
		$dataTampil=mysql_fetch_array($qryTampil);

		
		header("Content-type: $dataTampil[foto_tipe];");
		
		echo $dataTampil['foto'];
?>