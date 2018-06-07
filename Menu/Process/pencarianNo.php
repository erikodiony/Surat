<html>
<head>
  <title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspPencarian &nbsp|</title>
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
		
			<!-- Modal #ppAwal Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-search"></span>&nbsp Pencarian No. Surat / No. Agenda</h4>	
			</div>
		<?php
		$IDNo = mysql_real_escape_string($_POST['cari_no']);
		?>
			<!-- Modal #ppAwal Body -->
			<div class="modal-body" >
				<h4>Hasil Pencarian dengan Kata Kunci : <?php echo $IDNo;?></h4>
				<!-- Menu TabCariNo -->
				<div role="tabpanel">
											
					<ul class="nav nav-tabs" role="tablist" id="tabCariNo">
						<li role="presentation" class="active"><a onclick="myLoop2()" href="#TabCariNoSuratMasuk" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th-list"></span>&nbsp (Surat Masuk) No. Surat</a></li>
						<li role="presentation"><a onclick="myLoop2()" href="#TabCariNoSuratKeluar" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th-list"></span>&nbsp (Surat Keluar) No. Surat</a></li>
						<li role="presentation"><a onclick="myLoop2()" href="#TabCariNoAgendaMasuk" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th-list"></span>&nbsp (Surat Masuk) No. Agenda</a></li>
						<li role="presentation"><a onclick="myLoop2()" href="#TabCariNoAgendaKeluar" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th-list"></span>&nbsp (Surat Keluar) No. Agenda</a></li>
					</ul>

					<!-- Tab panes -->
						<div class="tab-content">
							<!-- Tab #ppPencarianNo #TabCariNoSuratMasuk -->
							<div role="tabpanel" class="tab-pane fade in active" id="TabCariNoSuratMasuk">
								<table class="table table-striped"> 
									<thead>
										<tr>
											<td><strong><div align="center"><span class="glyphicon glyphicon-pencil"></span>&nbsp No. Surat</span></div></strong></td> 
											<td><strong><div align="center"><span class="glyphicon glyphicon-user"></span>&nbsp Surat Dari</span></div></strong></td>	
											<td><strong><div align="center"><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</span></div></strong></td>	
											<td><strong><div align="center"><span class="glyphicon glyphicon-cog"></span></div></strong></td>
										</tr>
									</thead>
								<?php 
									include('../../Scripts/connect.php');
									$tampil="SELECT * FROM `s_masuk` WHERE srt_no LIKE '%$IDNo%' ORDER BY `no_agenda` ASC"; 
									$qryTampil=mysql_query($tampil); 
									while ($dataTampil=mysql_fetch_array($qryTampil)) { 
								?> 
										<tr> 
											<td><div align="center"><strong><?php echo $dataTampil['srt_no'] ; ?></strong></div></td>
											<td><div align="center"><strong><?php echo $dataTampil['srt_dari'] ; ?></strong></div></td>
											<td><div align="center"><strong><?php echo $dataTampil['srt_perihal'] ; ?></strong></div></td>
											<td><div align="center"><strong>
											<a href="tampilSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
											<a href="editSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
											<a target="blank" href="cetak.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Cetak" class="glyphicon glyphicon-print"></span></a>
											<a href="cekHapusSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
											</strong></div></td>
										</tr> 
								<?php } ?> 
								</table>
							</div>
							
							<!-- Tab #ppPencarianTgl #TabCariNoSuratKeluar -->
							<div role="tabpanel" class="tab-pane fade in" id="TabCariNoSuratKeluar">
								<table class="table table-striped"> 
									<thead>
										<tr>
											<td><strong><div align="center"><span class="glyphicon glyphicon-pencil"></span>&nbsp No. Surat</span></div></strong></td> 
											<td><strong><div align="center"><span class="glyphicon glyphicon-user"></span>&nbsp Surat Dikirim Ke</span></div></strong></td>	
											<td><strong><div align="center"><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</span></div></strong></td>	
											<td><strong><div align="center"><span class="glyphicon glyphicon-cog"></span></div></strong></td>
										</tr>
									</thead>
								<?php 
									include('../../Scripts/connect.php');
									$tampil="SELECT * FROM `s_keluar` WHERE srt_no LIKE '%$IDNo%' ORDER BY `no_agenda` ASC"; 
									$qryTampil=mysql_query($tampil); 
									while ($dataTampil=mysql_fetch_array($qryTampil)) { 
								?> 
										<tr> 
											<td><div align="center"><strong><?php echo $dataTampil['srt_no'] ; ?></strong></div></td>
											<td><div align="center"><strong><?php echo $dataTampil['srt_ke'] ; ?></strong></div></td>
											<td><div align="center"><strong><?php echo $dataTampil['srt_perihal'] ; ?></strong></div></td>
											
											<td><div align="center"><strong>
											<a href="tampilSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
											<a href="editSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
											<a href="cekHapusSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
											</strong></div></td>
										</tr> 
								<?php } ?> 
								</table>
							</div>		
							
							<!-- Tab #ppPencarianTgl #TabCariNoAgendaMasuk -->
							<div role="tabpanel" class="tab-pane fade in" id="TabCariNoAgendaMasuk">
								<table class="table table-striped"> 
									<thead>
										<tr>
											<td><strong><div align="center"><span class="glyphicon glyphicon-globe"></span>&nbsp No. Agenda</div></strong></td> 
											<td><strong><div align="center"><span class="glyphicon glyphicon-user"></span>&nbsp Surat Dari</span></div></strong></td> 
											<td><strong><div align="center"><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</span></div></strong></td>	
											<td><strong><div align="center"><span class="glyphicon glyphicon-cog"></span></div></strong></td>
										</tr>
									</thead>
								<?php 
									include('../../Scripts/connect.php');
									$tampil="SELECT * FROM `s_masuk` WHERE no_agenda LIKE '%$IDNo%' ORDER BY `no_agenda` ASC"; 
									$qryTampil=mysql_query($tampil); 
									while ($dataTampil=mysql_fetch_array($qryTampil)) { 
								?> 
										<tr> 
											<td><div align="center"><strong><?php echo $dataTampil['no_agenda'] ; ?></strong></div></td> 
											<td><div align="center"><strong><?php echo $dataTampil['srt_dari'] ; ?></strong></div></td>
											<td><div align="center"><strong><?php echo $dataTampil['srt_perihal'] ; ?></strong></div></td>
											<td><div align="center"><strong>
											<a href="tampilSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
											<a href="editSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
											<a target="blank" href="cetak.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Cetak" class="glyphicon glyphicon-print"></span></a>
											<a href="cekHapusSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
											</strong></div></td>
										</tr> 
								<?php } ?> 
								</table>
							</div>	
							
							<!-- Tab #ppPencarianTgl #TabCariNoAgendaKeluar -->
							<div role="tabpanel" class="tab-pane fade in" id="TabCariNoAgendaKeluar">
								<table class="table table-striped"> 
									<thead>
										<tr>
											<td><strong><div align="center"><span class="glyphicon glyphicon-globe"></span>&nbsp No. Agenda</div></strong></td> 
											<td><strong><div align="center"><span class="glyphicon glyphicon-user"></span>&nbsp Surat Dikirim Ke</span></div></strong></td> 
											<td><strong><div align="center"><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</span></div></strong></td>	
											<td><strong><div align="center"><span class="glyphicon glyphicon-cog"></span></div></strong></td>
										</tr>
									</thead>
								<?php 
									include('../../Scripts/connect.php');
									$tampil="SELECT * FROM `s_keluar` WHERE no_agenda LIKE '%$IDNo%' ORDER BY `no_agenda` ASC"; 
									$qryTampil=mysql_query($tampil); 
									while ($dataTampil=mysql_fetch_array($qryTampil)) { 
								?> 
										<tr> 
											<td><div align="center"><strong><?php echo $dataTampil['no_agenda'] ; ?></strong></div></td> 
											<td><div align="center"><strong><?php echo $dataTampil['srt_ke'] ; ?></strong></div></td>
											<td><div align="center"><strong><?php echo $dataTampil['srt_perihal'] ; ?></strong></div></td>
											<td><div align="center"><strong>
											<a href="tampilSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
											<a href="editSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
											<a href="cekHapusSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
											</strong></div></td>
										</tr> 
								<?php } ?> 
								</table>
							</div>
						</div>
				</div>
			
			</div>
			<!-- Modal #ppAwal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="window.location.href = 'cekAutentikasi.php'"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>


<div class="container">
	

<div class="row">

	
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

function myLoop2() {         
	var i = 1;  
   setInterval(function () {         
      i++;                   
      if (i < 3) {         
           nanobar.go(50*i);
      }                     
      else{}
   }, 300)
}

myLoop();
</script>

</html>