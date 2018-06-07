<!-- Cek Folder -->
<?php
session_start();
if (!isset($_SESSION['level'])) {
	echo '<meta http-equiv="refresh" content="0; url=../../Login" />';
} else {
	if ($_SESSION['level'] == "Admin") {
		echo '<meta http-equiv="refresh" content="0; url=../admin.php" />';
	} else {
		echo '<meta http-equiv="refresh" content="0; url=../user.php" />';
	}  
}

?>