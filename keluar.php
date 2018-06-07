<?php  
session_start(); 
session_destroy();
echo '<script type="text/javascript">
alert("./Logout Sukses! ^_^ \n./Terima Kasih! Anda Telah Keluar dari Sistem! ^_^ ");
</script>';
echo '<meta http-equiv="refresh" content="0; url=../Surat" />';
?> 