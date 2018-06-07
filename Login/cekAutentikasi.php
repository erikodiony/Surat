<!-- Cek Folder -->
<?php
session_start();
if (!isset($_SESSION['level'])) {
	echo '<meta http-equiv="refresh" content="0; url=./" />';
} else {
	if ($_SESSION['level'] == "Admin") {
		echo '<meta http-equiv="refresh" content="0; url=../Menu/admin.php" />';
	} else {
		echo '<meta http-equiv="refresh" content="0; url=../Menu/user.php" />';
	}  
}

?>