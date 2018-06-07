<?php
session_start();
		

if (isset($_SESSION['level']) == null) {
	echo '<meta http-equiv="refresh" content="0; url=../" />'; 
} else {
	if ($_SESSION['level'] == "User") {		
			echo '<meta http-equiv="refresh" content="0; url=../Menu/user.php" />'; 
	} else {		
			echo '<meta http-equiv="refresh" content="0; url=../Menu/admin.php" />'; 
	}
}
?>