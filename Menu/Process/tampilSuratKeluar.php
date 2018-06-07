<html>
<?php
	include('../../Scripts/connect.php');
	$no_urutk = mysql_real_escape_string($_GET['no_urutk']);
	$sqlTampil="SELECT * FROM s_keluar WHERE no_urut='".$no_urutk."';";  
	$qryTampil=mysql_query($sqlTampil);  
	$dataTampil=mysql_fetch_array($qryTampil);  
     ?> 
<head>
<title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspTampil&nbspSurat&nbspMasuk &nbsp|</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="../../Images/Logo.png">
  	<link rel="stylesheet" href="../../Scripts/Bootstrap/css/bootstrap.min.css">
	<script src="../../Scripts/jquery-2.1.4.min.js"></script>
	<script src="../../Scripts/NanoBar/nanobar.min.js"></script>
	<script type="text/javascript" src="../../Scripts/Bootstrap/js/bootstrap.min.js"></script>

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
. {
margin:10px auto;
padding:5px;
width:93%;
}
.controls {
background:url('../../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:93%;
}
.entry {
margin:10px auto;
padding:5px;
width:93%;
}
</style>

<style>
#formEditSuratMasuk .inputGroupContainer .form-control-feedback,
#formEditSuratMasuk .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
</style>

<!-- Keterangan Kursor -->
<script>
$(document).ready(function(){
    $('[data-toggle="intip"]').tooltip();   
});
</script>

<!-- Konfig tab -->
<style type="text/css">
.tab-content {
    margin-top: 20px;
}
</style>

	<script type="text/javascript">
		$(window).load(function()
		{
			$('#ppTampil').modal('show');
			$('#ppTampil').data('bs.modal').isShown = true;
		});
	</script>

</head>

<!-- ModalMain #ppTampil -->
<div class="modal fade" id="ppTampil" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static"  aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
		
			<!-- Modal #ppBuatSurat Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>&nbsp Tampil Surat Keluar</h4>	
				<div align="left">Harap Ketika Memasukkan Data, Cek secara Teliti dan Benar!</div>
			</div>
			
			<!-- Modal #ppAwal Body -->
			<div class="modal-body" >

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><b>No. Agenda : <?php echo $dataTampil['no_agenda'] ; ?> (Surat Keluar)</b></h3>
					</div>
		
					<div class="panel-body">
						<label class="col-md-4">No. Agenda</label>
						<label class="col-md-8 col-md-offset-0">: <?php echo $dataTampil['no_agenda'] ; ?></label>
						<label class="col-md-4">No. Berkas</label>
						<label class="col-md-8 col-md-offset-0">: <?php echo $dataTampil['no_berkas'] ; ?></label>
						<label class="col-md-4">Tanggal Dikirim</label>
						<label class="col-md-8 col-md-offset-0">: <?php echo $dataTampil['tgl_suratk'] ; ?></label>
						<label class="col-md-4">No. Surat</label>
						<label class="col-md-8 col-md-offset-0">: <?php echo $dataTampil['srt_no'] ; ?></label>
						<label class="col-md-4">Dikirim Kepada</label>
						<label class="col-md-8 col-md-offset-0">: <?php echo $dataTampil['srt_ke'] ; ?></label>
						<label class="col-md-4">Perihal Surat</label>
						<label class="col-md-8 col-md-offset-0">: <?php echo $dataTampil['srt_perihal'] ; ?></label>
						<div class="col-md-12">
						<hr>
						</div>
						<div class="col-md-5 col-md-offset-1">
						<button class="btn btn-lg btn-warning" onclick="location.href='editSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>'"><span class="glyphicon glyphicon-edit"></span> Edit</button>
						</div>
						<div class="col-md-5 col-md-offset-1">
						<button class="btn btn-lg btn-danger" onclick="location.href='cekHapusSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>'"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
						</div>
						
					</div>
				</div>
			
			</div>
			
			<!-- Modal #ppBuatSurat #ppSuratBaru Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="window.location.href = 'cekAutentikasi.php'"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Judul Marquee -->
<script>
(function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();
</script>



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