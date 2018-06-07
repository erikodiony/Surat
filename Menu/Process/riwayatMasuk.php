<html>
<?php
include('../../Scripts/connect.php');
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) FROM `s_masuk` WHERE `no_agenda` NOT LIKE '0'");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<head>
<title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspRiwayat &nbsp Surat&nbsp Masuk&nbsp|</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="../../Images/Logo.png">
  	<link rel="stylesheet" href="../../Scripts/Bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="../../Scripts/Validator/css/formValidation.css"/>
	<link rel="stylesheet" href="../../Scripts/DatePicker/css/bootstrap-datetimepicker.min.css">
	<script src="../../Scripts/jquery-2.1.4.min.js"></script>
	<script src="../../Scripts/NanoBar/nanobar.min.js"></script>
	<script src="../../Scripts/DatePicker/js/bootstrap-datetimepicker.js"></script>
	<script src="../../Scripts/DatePicker/js/bootstrap-datepicker.id.js"></script>
	<script type="text/javascript" src="../../Scripts/Bootstrap/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="../../Scripts/Validator/js/formValidation.js"></script>
  	<script type="text/javascript" src="../../Scripts/Validator/js/framework/bootstrap.js"></script>

<style> 
body {
	background:url('../../Images/bg.jpg') no-repeat fixed top center;
}
a { color:#000000 }
	label {color:#000000}
	a:focus { color:#000000}
	p { color:#000000 }
	.navbar-fixed-top { background:#F5DEB3 }
	.navbar-fixed-bottom { background:#DEB887 }
	.modal-backdrop { background:#000000 }
	div { color:#000000 }
	hr {
		width: 80%;
		height: 2px;
		margin-left: auto;
		margin-right: auto;
		background-color:#000000;
		color:#000000;
		border: 0 none;
		margin-top: 5px;
		margin-bottom:15px;
		}
.hero-unit {
background:url('../../Images/bg-transparent.png') repeat top center;
margin:25px auto;
padding:5px;
width:95%;
}
.kolom {
background:url('../../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:78%;
}
.headisi {
background:url('../../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:93%;
}
.isi {
background:url('../../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:93%;
}
</style>

<!-- Konfig Tab FormEditAkun dan FormEditAkun2 -->
<style type="text/css">
.tab-content {
    margin-top: 20px;
}
</style>

<!-- Judul Marquee -->
<script>
(function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();
</script>

<!-- Tampil Modal #ppAwal -->
<script>
	$(document).ready(function() {
    setTimeout(function() {
		$('#ppAwal').modal('show');
    }, 300);
});
</script>

</head>
<body>

<!-- Modal #ppAwal -->
<div class="modal fade" id="ppAwal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-flag"></span> Riwayat Surat Masuk</h4>
		<h5>Anda Dapat Mencetak Surat Masuk / Melihat Data Surat Masuk lebih detail !</h5>
      </div>
      <div class="modal-body">

	   <?php
		$per_hal= (isset($_GET['per_page'])) ? (int)$_GET['per_page'] : 5;
		$jumlah_record=mysql_query("SELECT COUNT(*) FROM `s_masuk` WHERE `no_agenda` NOT LIKE '0'");
		$jum=mysql_result($jumlah_record, 0);
		$halaman=ceil($jum / $per_hal);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page - 1) * $per_hal;
	   ?>
		
		<div class="col-lg-9">
		<form id="perPage" method="get" class="form-horizontal">
		<label>Edit Tampilan Data per Halaman</label>
			<div class="input-group col-lg-5">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Ubah</button>
				</span>
				<input type="text" name="per_page" class="form-control" placeholder="Tampil Data per Hal...">
			</div>
		</form>
		</div>
		
			<div class="col-md-9">
				<label>Jumlah Data Ditemukan : <?php echo $jum;?></label><br>
				<label>Tampilan Data per Halaman : <?php echo $per_hal;?></label>
			</div>
			<div class="col-md-3">
				<label>Halaman Ke : <?php echo $page;?></label><br>
				<label>Jumlah Halaman : <?php echo $halaman;?></label>
				
			</div>

		
		<table class="table table-striped"> 
			  <tr>
				<td><div align="center"><strong><span class="glyphicon glyphicon-globe"></span>&nbsp No. Agenda</strong></div></td>
				<td><div align="center"><strong><span class="glyphicon glyphicon-calendar"></span>&nbsp Tgl. Diterima</strong></div></td> 
				<td><div align="center"><strong><span class="glyphicon glyphicon-user"></span>&nbsp Surat Dari</strong></div></td> 
				<td><div align="center"><strong><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</strong></div></td>
				<td><div align="center"><strong><span class="glyphicon glyphicon-cog"></span></strong></div></td>
			  </tr> 
		  <?php 
			  $tampil="SELECT * FROM `s_masuk` ORDER BY no_agenda DESC limit $start, $per_hal;"; 
			  $qryTampil=mysql_query($tampil); 
			  while ($dataTampil=mysql_fetch_array($qryTampil)) { 
		  ?> 
			   <tr> 
				<td><center><?php echo $dataTampil['no_agenda'] ; ?></center></td> 
				<td><center><?php echo $dataTampil['tgl_terima']; ?></center></td> 
				<td><center><?php echo $dataTampil['srt_dari']; ?></center></td> 
				<td><center><?php echo $dataTampil['srt_perihal']; ?></center></td> 
				<td><div align="center">
				<a href="tampilSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
				<a href="editSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
                <a target="blank" href="cetak.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Cetak Nota" class="glyphicon glyphicon-print"></span></a>
				<a href="cekHapusSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
				</td>  
			  </tr> 
		<?php } ?> 
		</table>	

		
			<nav>
  <ul class="pagination">
   
<?php for($x=1;$x<=$halaman;$x++){ ?>
    <li><a href="?per_page=<?php echo $_GET['per_page']?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>	
<?php } ?>

  </ul>
</nav>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="window.location.href = 'cekAutentikasi.php'"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
      </div>
    </div>
  </div>
</div>

</body>

<script>
var nanobar = new Nanobar();                  
function myLoop() {         
	var i = 1;  
   setInterval(function () {         
      i++;                   
      if (i < 5) {         
           nanobar.go(25*i);
      }                     
      else{}
   }, 600)
}
myLoop();
</script>

</html>