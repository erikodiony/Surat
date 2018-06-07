<?php
session_start();

if(!isset($_SESSION['level']))
	{	
		echo '<script type="text/javascript">
				alert("./Dilarang! :( \n./Saat ini Anda Belum Login ! :( Silahkan Login Terlebih Dahulu! ^_^ ");
			</script>';
		echo '<meta http-equiv="refresh" content="0; url=../Login" />'; 
	}

	else 
	{
	if ($_SESSION['level'] == "Admin")
			{} 
	else if ($_SESSION['level'] == "User")
			{
			header('location:Process/cekAutentikasi.php');
			} 	
	}
	include('../Scripts/connect.php');
			$BersihkanM = "DELETE FROM s_masuk WHERE no_agenda = '0';";
			$BersihkanK = "DELETE FROM s_keluar WHERE no_agenda = '0';";
			mysql_query ($BersihkanM);
			mysql_query ($BersihkanK);

date_default_timezone_set("Asia/Jakarta");
$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$bulan = $array_bulan[date('n')];// untuk membuat bulan
$tgl = date('d');
$thn = date('Y');
$tgl_indo = $tgl." ".$bulan." ".$thn;
?>
<html>
<head>
<title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspAdmin &nbsp|</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="../Images/Logo.png">
  	<link rel="stylesheet" href="../Scripts/Bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="../Scripts/Validator/css/formValidation.css"/>
	<link rel="stylesheet" href="../Scripts/DatePicker/css/bootstrap-datetimepicker.min.css">
	<script src="../Scripts/jquery-2.1.4.min.js"></script>
	<script src="../Scripts/NanoBar/nanobar.min.js"></script>
	<script src="../Scripts/DatePicker/js/bootstrap-datetimepicker.js"></script>
	<script src="../Scripts/DatePicker/js/bootstrap-datepicker.id.js"></script>
	<script type="text/javascript" src="../Scripts/Bootstrap/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="../Scripts/Validator/js/formValidation.js"></script>
  	<script type="text/javascript" src="../Scripts/Validator/js/framework/bootstrap.js"></script>

<style>
body {
	background:url('../Images/bg.jpg') no-repeat fixed top center;
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
background:url('../Images/bg-transparent.png') repeat top center;
margin:25px auto;
padding:5px;
width:98%;
}
.kolom {
background:url('../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:90%;
}
.headisi {
background:url('../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:98%;
}
.isi {
background:url('../Images/bg-transparent.png') repeat top center;
margin:10px auto;
padding:5px;
width:98%;
}
.right{
    float:right;
}

.left{
    float:left;
}
</style>

<style type="text/css">
#formEditAkun .inputGroupContainer .form-control-feedback,
#formEditAkun .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
#formEditAkun2 .inputGroupContainer .form-control-feedback,
#formEditAkun2 .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
#formTambahAkun .inputGroupContainer .form-control-feedback,
#formTambahAkun .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
#formTambahSuratMasuk .inputGroupContainer .form-control-feedback,
#formTambahSuratMasuk .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
#formTambahSuratKeluar .inputGroupContainer .form-control-feedback,
#formTambahSuratKeluar .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
#formPencarianTgl .inputGroupContainer .form-control-feedback,
#formPencarianTgl .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
#formPencarianNo .inputGroupContainer .form-control-feedback,
#formPencarianNo .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
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


</head>
<body>




<!-- Body Halaman -->
<div class="container">
	<div class="hero-unit">
		<h3><center><img src="../Images/logo.png" class="img-thumbnail" alt="Logo" width="70" height="90">&nbsp &nbsp &nbsp Aplikasi Pengelolaan Surat Dinsosnaker Kota Kediri (Berbasis Web)</center></h3>
	</div>

<div class="row">
	<!-- Menu Pinggir -->
	<div class="col-md-3">
		<div class="kolom"><br>
		<center><img src="../Images/gambar.php?user=<?php echo $_SESSION['user']?>" class="img-thumbnail" alt="FotoProfil" width="150" height="150"></center>
		<center><h5><b><strong><a href="#ppEditAkun" style="text-decoration:none" data-toggle="modal" data-target="#ppEditAkun" onclick="myLoop()"><span class="glyphicon glyphicon-edit"></span>&nbsp Edit Akun </a></strong></b></h5></center>
		<hr>
			<center><h3><span class="glyphicon glyphicon-dashboard"></span>&nbsp Panel Menu</h3></center>
				<table class="table">
					<thead>
						<tr><th></th></tr>
						<tr><th><a href="" style="text-decoration:none" data-toggle="modal" data-target="#ppPencarian" onclick="myLoop()"><span class="glyphicon glyphicon-search"></span> &nbsp Pencarian</a></th></tr>
						<tr><th><a href="" style="text-decoration:none" data-toggle="modal" data-target="#ppTambahAkun" onclick="myLoop()"><span class="glyphicon glyphicon-plus"></span> &nbsp Tambah Pengguna</a></th></tr>
						<tr><th><a href="" style="text-decoration:none" data-toggle="modal" data-target="#ppList" onclick="myLoop()"><span class="glyphicon glyphicon-th-list"></span> &nbsp List Pengguna</a></th></tr>
						<tr><th><a href="" style="text-decoration:none" data-toggle="modal" data-target="#ppBuatSurat" onclick="myLoop()"><span class="glyphicon glyphicon-envelope"></span> &nbsp Buat Surat Baru</a></th></tr>
						<tr><th><a href="Process/riwayatMasuk.php?per_page=5" style="text-decoration:none"><span class="glyphicon glyphicon-save"></span>  &nbsp Riwayat Surat Masuk</a></th></tr>
			            <tr><th><a href="Process/riwayatKeluar.php?per_page=5" style="text-decoration:none"><span class="glyphicon glyphicon-open"></span> &nbsp Riwayat Surat Keluar</a></th></tr>
			            <tr><th><a href="../keluar.php" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> &nbsp Keluar</a></th></tr>
					</thead>
				</table>
		</div>
	</div>

	<div class="col-md-9">
		<div class="headisi">
			<center><h4><marquee behavior="scroll" direction="left" scrollamount="3" scrolldelay="20" width="80%">
			<span>./Selamat Datang di Aplikasi Surat - Menyurat Dinsosnaker Kota Kediri (Berbasis Web) ! (Jam Kerja : 08.00 - 16.00 Senin s/d Jumat) </span>
			</marquee></h4></center>
		</div>

		<div class="isi">
		<div class="col-md-6">
			<h4><b><?php echo "<p>Selamat Datang, ".$_SESSION['user']." (".$_SESSION['level'].")</p>";?></b></h4>
		</div>
		<div class="col-md-6">
			<h4 class="text-right"><b><a href="admin.php" style="text-decoration:none"><span class="glyphicon glyphicon-refresh"></span> Segarkan</a></b></h4>
		</div>
		<div class="col-md-12">
			<h5><b><?php date_default_timezone_set("Asia/Jakarta"); echo "Tanggal : " .$tgl_indo ?></b></h5>
			<h5><b><div id="time"></div></h5>
		</div>			
			<center><h4><b>Daftar Surat - Surat</b><h4></center>

			
			
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <!-- HideMenu Surat Masuk -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title" onclick="myLoop2()">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none">
              <span class="glyphicon glyphicon-th-list"></span><b> Surat - Surat Masuk (<?php date_default_timezone_set("Asia/Jakarta"); echo $tgl_indo ;?>)</b></a>
            </h4>
            </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">

                  <table class="table table-striped">				  
                  <thead>
                  <tr>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-globe"></span>&nbsp No. Agenda</div></strong></td>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-User"></span>&nbsp Surat Dari</div></strong></td>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</div></strong></td>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-cog"></span></div></strong></td>
                  </tr></thead>
				<?php
					include('../Scripts/connect.php');
					$sqlTampil="select * from s_masuk Where tgl_terima ='$tgl_indo' ORDER BY no_agenda";  
					$qryTampil=mysql_query($sqlTampil);  
					while ($dataTampil=mysql_fetch_array($qryTampil)) { 
				?>
                  <tr>
                  <td><div align="center"><strong><?php echo $dataTampil['no_agenda'] ; ?></strong></div></td>
                  <td><div align="center"><strong><?php echo $dataTampil['srt_dari'] ; ?></strong></div></td>
                  <td><div align="center"><strong><?php echo $dataTampil['srt_perihal'] ; ?></strong></div></td>
                  <td><div align="center"><strong>
                  <a href="Process/tampilSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
				  <a href="Process/editSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
                  <a target="blank" href="cetak.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Cetak Nota" class="glyphicon glyphicon-print"></span></a>
				  <a href="Process/cekHapusSuratMasuk.php?no_urutm=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
				  </strong></div></td>
                  </tr>


					<?php } ?> 
                  </table>


              </div>
              </div>
        </div>
        <!-- HideMenu Surat Keluar -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title" onclick="myLoop2()">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="text-decoration:none">
                            <span class="glyphicon glyphicon-th-list"></span><b> Surat - Surat Keluar (<?php date_default_timezone_set("Asia/Jakarta"); echo $tgl_indo ;?>)</b></a>
            </h4>
            </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">

                  <table class="table table-striped">
                  <thead>
                  <tr>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-globe"></span>&nbsp No. Agenda</div></strong></td>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-User"></span>&nbsp Di Kirim Kepada</div></strong></td>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-paperclip"></span>&nbsp Perihal</div></strong></td>
                  <td><strong><div align="center"><span class="glyphicon glyphicon-cog"></span></div></strong></td>
                  </tr></thead>
				<?php
					include('../Scripts/connect.php');
					$sqlTampil="select * from s_keluar Where tgl_suratk ='$tgl_indo' ORDER BY no_agenda";  
					$qryTampil=mysql_query($sqlTampil);  
					while ($dataTampil=mysql_fetch_array($qryTampil)) { 
				?>
                  <tr>
                  <td><div align="center"><strong><?php echo $dataTampil['no_agenda'] ; ?></strong></div></td>
                  <td><div align="center"><strong><?php echo $dataTampil['srt_ke'] ; ?></strong></div></td>
                  <td><div align="center"><strong><?php echo $dataTampil['srt_perihal'] ; ?></strong></div></td>
                  <td><div align="center"><strong>
                  <a href="Process/tampilSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Lihat Surat" class="glyphicon glyphicon-zoom-in"></span></a>
				  <a href="Process/editSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Edit Surat" class="glyphicon glyphicon-edit"></span></a>
                  <a href="Process/cekHapusSuratKeluar.php?no_urutk=<?php echo $dataTampil['no_urut'] ; ?>"  style="text-decoration:none"><span data-toggle="intip" title="Hapus Surat" class="glyphicon glyphicon-trash"></span></a>
				  </strong></div></td>
                  </tr>

					<?php } ?> 
                  </table>


              </div>
              </div>
        </div>

        </div>

		</div>
	</div>
</div>



<!-- Modal #ppEditAkun -->
<div class="modal fade" id="ppEditAkun" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
		
			<!-- Modal #ppEditAkun Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Akun</h4>	
				<div align="left">Pastikan Anda memasukkan Identitas Akun yg sesuai dengan Identitas Diri Anda!</div>
			</div>
			
			<!-- Modal #ppEditAkun Body -->
		<div class="modal-body" >
					<ul class="nav nav-pills">
						<li class="active"><a href="#tabEdit-1" data-toggle="tab" onclick="myLoop2()"><span class="glyphicon glyphicon-user"></span>&nbsp Identitas Akun</a></li>
						<li><a href="#tabEdit-2" data-toggle="tab" onclick="myLoop2()"><span class="glyphicon glyphicon-picture"></span>&nbsp Identitas Foto</a></li>
					</ul>
					
					<?php
					include('../Scripts/connect.php');
					$sqlTampil="select * from login Where user='$_SESSION[user]'";  
					$qryTampil=mysql_query($sqlTampil);  
					$dataTampil=mysql_fetch_array($qryTampil);  
					?>
					
					<!-- Tab Boostrap Wizard #formEditAkun -->
					<div class="tab-content">
					
						<!-- Tab Pertama #Wizard #formEditAkun -->
						<div class="tab-pane active" id="tabEdit-1">
							<form id="formEditAkun" class="form-horizontal" action="Process/cekEditAkun.php" method="post">
								<div class="form-group">
									<label class="col-md-3 control-label">Nama Pengguna</label>
										<div class="col-md-6 inputGroupContainer">
											<div class="input-group">
											<input type="text" name="idlogin" readonly class="form-control" value="<?php echo $dataTampil['user'] ?>" placeholder="Nama Pengguna..">
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Hak Akses</label>
										<div class="col-md-6 inputGroupContainer">
											<div class="input-group">
											<input type="text" name="level" readonly class="form-control" placeholder="Hak Akses.." value="<?php echo $dataTampil['level']?>">
											<span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Kata Sandi</label>
										<div class="col-md-6 inputGroupContainer">
											<div class="input-group">
											<input type="text" name="pwdlogin" id="pwdlogin" class="form-control" placeholder="Kata Sandi.." value="<?php echo $dataTampil['pass']?>">
											<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" id="captchaOperationEditAkun"></label>
										<div class="col-md-3 inputGroupContainer">
											<input type="text" class="form-control" name="captchaEditAkun" />
										</div>
								</div>
								<ul class="pager wizard">
									<li class="next"><button type="submit" class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp Simpan</button></li>
								</ul>
							</form>
						</div>
		
						<!-- Tab Kedua #Wizard #formEditAkun2 -->
						<div class="tab-pane" id="tabEdit-2">
							<form id="formEditAkun2" class="form-horizontal" action="Process/cekEditAkun2.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-3 control-label">Foto Anda</label>
									<div class="col-md-8 inputGroupContainer">
										<img src="../Images/gambar.php?user=<?php echo $_SESSION['user']?>" class="img-thumbnail" alt="FotoProfil" width="100" height="100">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Ganti Foto</label>
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<input type="file" class="form-control" name="anu2" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-camera"></span></span>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" id="captchaOperationEditAkun2"></label>
										<div class="col-md-3 inputGroupContainer">
											<input type="text" class="form-control" name="captchaEditAkun2" />
										</div>
								</div>
								<ul class="pager wizard">
									<li class="next"><button type="submit" class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp Simpan</button></li>
								</ul>
							</form>
						</div>
					</div>				
			</div>
			
			<!-- Modal #ppEditAkun Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="myLoop()"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
</div>
</div>

<!-- Modal #ppPencarian -->
<div class="modal fade" id="ppPencarian" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
		
			<!-- Modal #ppPencarian Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-search"></span>&nbsp Pencarian</h4>	
				<div align="left">Pencarian Multi termasuk dalam Pencarian :</div>
			</div>
			
			<!-- Modal #ppPencarian Body -->
			<div class="modal-body" >
								<label class="col-md-12">Pencarian Berdasarkan Tanggal !</label>
								<br>
								<form id="formPencarianTgl" class="form-horizontal" action="Process/pencarianTgl.php" method="post">
									<div class="form-group">
										<label class="col-md-3 control-label">Kata Kunci</label>
											<div class="col-md-7 inputGroupContainer">
												<div class="input-group date form_date" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
										        <input readonly type="text" onfocus="Process/cekTgl()" name="cari_tgl" id="cari_tgl" class="form-control" placeholder="Masukkan Tanggal.." >
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										        </div>
											</div>	
									</div>		
									<div class="form-group">
										<label class="col-md-3 control-label" id="captchaOperationPencarianTgl"></label>
											<div class="col-md-3 inputGroupContainer">
												<input type="text" class="form-control" name="captcha" />
											</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp Cari Tanggal</button>
										</div>
									</div>
								</form>
								<hr>
								<label class="col-md-12">Pencarian Berdasarkan No. Surat / No. Agenda !</label>
								<br>
								<form id="formPencarianNo" class="form-horizontal" action="Process/pencarianNo.php" method="post">
									<div class="form-group">
										<label class="col-md-3 control-label">Kata Kunci</label>
											<div class="col-md-7 inputGroupContainer">
												<div class="input-group">
										        <input type="text" name="cari_no" id="cari_no" class="form-control" placeholder="Masukkan No. Surat / No. Agenda.." >
												<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
										        </div>
											</div>	
									</div>		
									<div class="form-group">
										<label class="col-md-3 control-label" id="captchaOperationPencarianNo"></label>
											<div class="col-md-3 inputGroupContainer">
												<input type="text" class="form-control" name="captcha" />
											</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp Cari No. Surat / No. Agenda</button>
										</div>
									</div>
								</form>
			</div>
			
			<!-- Modal #ppPencarian Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="myLoop()"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal #ppTambahAkun -->
<div class="modal fade" id="ppTambahAkun" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
		
			<!-- Modal #ppTambahAkun Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Tambah Pengguna</h4>	
				<div align="left">Harap selalu menggunakan Nama Lengkap dan Disertai dengan Foto Identitas</div>
			</div>

			<!-- Modal #ppTambahAkun Body -->
			<div class="modal-body" >
				<form id="formTambahAkun" class="form-horizontal" action="Process/cekTambahAkun.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Nama Pengguna</label>
								<div class="col-md-6 inputGroupContainer">
									<div class="input-group">
									<input type="text" name="idlogin" id="idlogin" class="form-control" placeholder="Nama Pengguna..">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									</div>
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Kata Sandi</label>
								<div class="col-md-6 inputGroupContainer">
									<div class="input-group">
									<input type="text" name="pwdlogin" id="pwdlogin" class="form-control" placeholder="Kata Sandi..">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									</div>
								</div>
						</div>						
						<div class="form-group">
								<label class="col-xs-3 control-label">Hak Akses</label>
									<div class="col-xs-5">
										<div class="radio">
											<label>
												<input checked="checked" type="radio" name="lvl" value="User" /> User
											</label>
										</div>
									</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Foto</label>
								<div class="col-md-8 inputGroupContainer">
								<div class="input-group">
									<input type="file" class="form-control" name="ft" />
								<span class="input-group-addon"><span class="glyphicon glyphicon-camera"></span></span>
								</div>
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" id="captchaOperation"></label>
								<div class="col-md-3 inputGroupContainer">
									<input type="text" class="form-control" name="captcha" />
								</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp Daftar</button>
							</div>
						</div>
				</form>
			</div>
			
			<!-- Modal #ppTambahAkun Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="myLoop()"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal #ppList -->
<div class="modal fade" id="ppList" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
		
			<!-- Modal #ppList Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-th-list"></span> List Pengguna</h4>	
				<div align="left">List Nama Pengguna Beserta Hak Akses dan Foto Identitas</div>
			</div>
			
			<!-- Modal #ppList Body -->
			<div class="modal-body" >
			
				<div class="panel-group" id="accordList" role="tablist" aria-multiselectable="true">
					<!-- Isi Collapse #ppList (Admin) -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="head1">
							<h4 class="panel-title" onclick="myLoop2()">
								<a style="text-decoration:none" data-toggle="collapse" data-parent="#accordList" href="#list1" aria-expanded="true" aria-controls="list1">
								<span class="glyphicon glyphicon-user"></span>&nbsp Admin
								</a>
							</h4>
						</div>
							<!-- Isi Tabel #ppList (Admin) -->
							<div id="list1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head1">
								<div class="panel-body">
									<table class="table table-striped"> 
										<tr>
											<td><div align="center"><strong><span class="glyphicon glyphicon-camera"></span></strong></div></td>
											<td><div align="center"><strong><span class="glyphicon glyphicon-user"></span></strong></div></td> 
											<td><div align="center"><strong><span class="glyphicon glyphicon-eye-open"></span></strong></div></td> 
											<td><div align="center"><strong><span class="glyphicon glyphicon-cog"></span></strong></div></td> 
										</tr> 
									<?php 
										include('../Scripts/connect.php');
										$tampil="select * from login WHERE `level`='Admin' ORDER BY user ASC "; 
										$qryTampil=mysql_query($tampil); 
										while ($dataTampil=mysql_fetch_array($qryTampil)) { 
									?> 
										<tr>
											<td><center><img src="../Images/gambar.php?user=<?php echo $dataTampil['user']?>" class="img-thumbnail" alt="FotoProfil" width="75" height="75"></center></td>
											<td><center><?php echo $dataTampil['user']; ?></center></td> 
											<td><center><?php echo $dataTampil['level']; ?></center></td> 
											<td><div align="center">
											<a href="#ppEditAkun" style="text-decoration:none" data-dismiss="modal" onclick="myLoop()" data-toggle="modal" data-target="#ppEditAkun"><span class="glyphicon glyphicon-edit"></span></a>
												</div>
											</td>  
										</tr> 
									<?php } ?> 
									</table>
								</div>
							</div>
					</div>
				
					<!-- Isi Collapse #ppList (User) -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="head2">
							<h4 class="panel-title" onclick="myLoop2()">
								<a style="text-decoration:none" class="collapsed" data-toggle="collapse" data-parent="#accordList" href="#list2" aria-expanded="false" aria-controls="list2">
								<span class="glyphicon glyphicon-user"></span>&nbsp User
								</a>
							</h4>
						</div>
							<!-- Isi Tabel #ppList -->
							<div id="list2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head2">
								<div class="panel-body">
									<table class="table table-striped"> 
										<tr>
											<td><div align="center"><strong><span class="glyphicon glyphicon-camera"></span></strong></div></td>
											<td><div align="center"><strong><span class="glyphicon glyphicon-user"></span></strong></div></td> 
											<td><div align="center"><strong><span class="glyphicon glyphicon-eye-open"></span></strong></div></td> 
											<td><div align="center"><strong><span class="glyphicon glyphicon-cog"></span></strong></div></td> 
										</tr> 
									<?php 
										include('../Scripts/connect.php');
										$tampil="select * from login WHERE `level`='User' ORDER BY user ASC "; 
										$qryTampil=mysql_query($tampil); 
										while ($dataTampil=mysql_fetch_array($qryTampil)) { 
									?> 
										<tr>
											<td><center><img src="../Images/gambar.php?user=<?php echo $dataTampil['user']?>" class="img-thumbnail" alt="FotoProfil" width="75" height="75"></center></td>
											<td><center><?php echo $dataTampil['user']; ?></center></td> 
											<td><center><?php echo $dataTampil['level']; ?></center></td> 
											<td><div align="center">
												<a href="Process/cekHapusAkun.php?user=<?php echo $dataTampil['user'] ; ?>"><span class="glyphicon glyphicon-trash"></span></a></div>
											</td>  
										</tr> 
									<?php } ?> 
									</table>
								</div>
							</div>
					</div>
			
			<!-- Modal #ppList Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="myLoop()"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<!-- Modal #ppBuatSurat -->
<div class="modal fade" id="ppBuatSurat" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		
			<!-- Modal #ppBuatSurat Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>&nbsp Buat Surat Baru</h4>	
				<div align="left">Harap Masukkan Data dengan Teliti dan Benar!</div>
			</div>
			
			<!-- Modal #ppAwal Body -->
			<div class="modal-body" >

<!-- Menu BuatSuratMasuk -->
				<div role="tabpanel">
											
					<ul class="nav nav-tabs" role="tablist" id="ppSuratBaru">
						<li role="presentation" class="active"><a href="#TabSuratMasuk" aria-controls="home" role="tab" data-toggle="tab" onclick="myLoop2()"><span class="glyphicon glyphicon-save"></span>&nbsp Buat Surat Masuk</a></li>
						<li role="presentation"><a href="#TabSuratKeluar" role="tab" data-toggle="tab" onclick="myLoop2()"><span class="glyphicon glyphicon-open"></span>&nbsp Buat Surat Keluar</a></li>
					</ul>

					<!-- NoUrut SuratKeluar #ppSuratBaru  -->
					<?php
					include('../Scripts/connect.php');
					$querySMasuk = mysql_query("SELECT * FROM s_masuk ORDER BY no_urut DESC LIMIT 1");
								$jml_noUrut = mysql_num_rows($querySMasuk);
								$data_nourut = mysql_fetch_array($querySMasuk);
					if($jml_noUrut <= 0)
						{ $NoUrutMasuk = 1;}		
					else{ $NoUrutMasuk = $data_nourut['no_urut'] + 1;}
					?>
					
					<?php
							$qCekDuplikasi = mysql_query("SELECT t1.no_agenda + 1 FROM s_masuk t1 WHERE NOT EXISTS (SELECT * FROM s_masuk t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda DESC LIMIT 1");
							$dataDup = mysql_fetch_array($qCekDuplikasi);
							$noDup = $dataDup['t1.no_agenda + 1'];
					?>
					
			
					<!-- Tab panes -->
						<div class="tab-content">
							<!-- Tab #ppBuatSurat (Surat Masuk)-->
							<div role="tabpanel" class="tab-pane fade in active" id="TabSuratMasuk">
								<form id="formTambahSuratMasuk" class="form-horizontal" action="Process/cekBuatSuratMasuk.php" method="post">
									<div class="form-group">
										<label class="col-md-2 control-label">*No. Entri</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_urutm" class="form-control" readonly value="<?php echo $NoUrutMasuk ?>" placeholder="No. Urut..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>

											<label class="col-md-2 control-label">No. Berkas</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_brks" id="no_brks" class="form-control" placeholder="No. Berkas..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
												</div>
											</div>
									</div>
							
									<div class="form-group">
											<label class="col-md-2 control-label">*No. Agenda</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_agd" id="no_agd" class="form-control" value="<?php echo $noDup ?>" placeholder="No. Agenda..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
												</div>
											</div>
											<label class="col-md-2 control-label">
											<button type="button" class="btn btn-warning btn-xs" onclick="btnTampil()">Cek Sebelumnya</button>
											</label>
											<div class="col-md-3 selectContainer" id="dw">
												<div class="input-group hidden"  id="dwCek">
													<span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
														<select class="form-control" name="level" id="dwVal">
															<option value="" selected>No.Agenda</option>
															<option class="divider" disabled></option>
																<?php 
																$qCekDuplikasi2 = mysql_query("SELECT t1.no_agenda + 1 FROM s_masuk t1 WHERE NOT EXISTS (SELECT * FROM s_masuk t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda ASC");
																while ($dataTampil=mysql_fetch_array($qCekDuplikasi2)) { 
																?>
															<option value="<?php echo $dataTampil['t1.no_agenda + 1']?>" label="<?php echo $dataTampil['t1.no_agenda + 1']?>"><?php echo $dataTampil['t1.no_agenda + 1']?></option>
																<?php } ?>
														</select>
												</div>
											</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Isi Disposisi</label>
											<div class="col-md-6 inputGroupContainer">
												<textarea class="form-control" name="isi_dps" rows="6" placeholder="Isi Disposisi.."></textarea>
											</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">*Tanggal Diterima</label>
											<div class="col-md-4 inputGroupContainer">
												<div class="input-group date form_date" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
										        <input readonly type="text" onfocus="Process/cekTgl()" name="tgl_msk" id="tgl_msk" class="form-control" placeholder="Tanggal Diterima.." >
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										        </div>
											</div>	
									</div>

									<div class="col-xs-12"><hr></div>

									<div class="form-group">
										<label class="col-md-2 control-label">*No. Surat</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_suratm" id="no_suratm" class="form-control" placeholder="No. Surat..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>
											<label class="col-md-2 control-label">*Tanggal Surat</label>
											<div class="col-md-4 inputGroupContainer">
												<div class="input-group date form_date2" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
										        <input readonly onfocus="Process/cekTgl()" type="text" name="tgl_suratm" id="tgl_suratm" class="form-control" placeholder="Tanggal Surat.." >
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										        </div>
											</div>	
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">*Surat Dari</label>
											<div class="col-md-6 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="dr_srt" id="dr_srt" class="form-control" placeholder="Surat Dari..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">*Perihal Surat</label>
											<div class="col-md-6 inputGroupContainer">
												<textarea class="form-control" name="isi_srt" rows="6" placeholder="Perihal Surat.."></textarea>
											</div>
									</div>
									
									<label class="col-md-3 control-label">*) Wajib diisi</label>
									<br></br>
									<div class="form-group">
										<label class="col-md-3 control-label" id="captchaOperationTambahSuratMasuk"></label>
											<div class="col-md-3 inputGroupContainer">
												<input type="text" class="form-control" name="captcha" />
											</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp Simpan</button>
										</div>
									</div>
								</form>
							</div>
							


					<?php
					include('../Scripts/connect.php');
					$querySKeluar = mysql_query("SELECT * FROM s_keluar ORDER BY no_urut DESC LIMIT 1");
								$jml_noUrutK = mysql_num_rows($querySKeluar);
								$data_nourutK = mysql_fetch_array($querySKeluar);
					if($jml_noUrutK <= 0)
						{ $NoUrutKeluar = 1;}		
					else{ $NoUrutKeluar = $data_nourutK['no_urut'] + 1;}
					?>
					
					<?php
							$qCekDuplikasiK = mysql_query("SELECT t1.no_agenda + 1 FROM s_keluar t1 WHERE NOT EXISTS (SELECT * FROM s_keluar t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda DESC LIMIT 1");
							$dataDupK = mysql_fetch_array($qCekDuplikasiK);
							$noDupK = $dataDupK['t1.no_agenda + 1'];
					?>

							<!-- Tab #ppBuatSurat (Surat Keluar) -->
							<div role="tabpanel" class="tab-pane fade in" id="TabSuratKeluar">
								<form id="formTambahSuratKeluar" class="form-horizontal" action="Process/cekBuatSuratKeluar.php" method="post">
									<div class="form-group">
										<label class="col-md-2 control-label">*No. Entri</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_urutk" class="form-control" readonly value="<?php echo $NoUrutKeluar ?>" placeholder="No. Urut..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>
											<label class="col-md-2 control-label">No. Berkas</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_brks" id="no_brks" class="form-control" placeholder="No. Berkas..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
												</div>
											</div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">*No. Agenda</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_agdK" id="no_agdK" class="form-control" placeholder="No. Agenda.." value="<?php echo $noDupK ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
												</div>
											</div>
											<label class="col-md-2 control-label">
											<button type="button" class="btn btn-warning btn-xs" onclick="btnTampil2()">Cek Sebelumnya</button>
											</label>
											<div class="col-md-3 selectContainer" id="dwK">
												<div class="input-group hidden"  id="dwKCek">
													<span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
														<select class="form-control" name="level" id="dwKVal">
															<option value="" selected>No.Agenda</option>
															<option class="divider" disabled></option>
																<?php 
																$qCekDuplikasiK2 = mysql_query("SELECT t1.no_agenda + 1 FROM s_keluar t1 WHERE NOT EXISTS (SELECT * FROM s_keluar t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda ASC");
																while ($dataTampilK=mysql_fetch_array($qCekDuplikasiK2)) { 
																?>
															<option value="<?php echo $dataTampilK['t1.no_agenda + 1']?>" label="<?php echo $dataTampilK['t1.no_agenda + 1']?>"><?php echo $dataTampilK['t1.no_agenda + 1']?></option>
																<?php } ?>
														</select>
												</div>
											</div>
									</div>
									
									<div class="form-group">
											<label class="col-md-3 control-label">*Tanggal Dikirim</label>
												<div class="col-md-6 inputGroupContainer">
												<div class="input-group date form_date" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
										        	<input type="text" name="tgl_suratk" id="tgl_suratk" class="form-control" placeholder="Tanggal Dikirim.." readonly>
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										        </div>
											</div>
									</div>

									<div class="col-xs-12"><hr></div>

									
									<div class="form-group">
										<label class="col-md-2 control-label">*No. Surat</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_suratk" id="no_suratk" class="form-control" placeholder="No. Surat..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
										</div>
										<label class="col-md-2 control-label">*Surat Kepada</label>
											<div class="col-md-4 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="kpd_srt" id="kpd_srt" class="form-control" placeholder="Surat Kepada..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">*Perihal Surat</label>
											<div class="col-md-6 inputGroupContainer">
												<textarea class="form-control" name="isi_srt" rows="6" placeholder="Perihal Surat.."></textarea>
											</div>
									</div>

									<label class="col-md-3 control-label">*) Wajib diisi</label>
									<br></br>
									<div class="form-group">
										<label class="col-md-3 control-label" id="captchaOperationTambahSuratKeluar"></label>
											<div class="col-md-3 inputGroupContainer">
												<input type="text" class="form-control" name="captcha" />
											</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp Simpan</button>
										</div>
									</div>
								</form>
							</div>
										
						</div>
				</div>

			
			</div>
			
			<!-- Modal #ppBuatSurat #ppSuratBaru Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="myLoop()"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>


</div>
</body>

<!-- KontrolValidasi #formEditAkun -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationEditAkun').html([randomNumber(1, 10), '+', randomNumber(1, 20), '='].join(' '));
	
    $('#formEditAkun').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			idlogin: {
				row: '.col-md-6',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Nama Pengguna" !'
                    },
                }
            },
			pwdlogin: {
				row: '.col-md-6',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Kata Sandi" !'
                    },
                }
            },
			level: {
				row: '.col-md-6',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memilih "Hak Akses" !'
                    },
                }
            },
			captchaEditAkun: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperationEditAkun').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
});
</script>

<!-- KontrolValidasi #formEditAkun2 -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationEditAkun2').html([randomNumber(1, 10), '+', randomNumber(1, 20), '='].join(' '));
	
    $('#formEditAkun2').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			anu2: {
				row: '.col-md-8',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Ganti Foto" !'
                    },
                }
            },
			captchaEditAkun2: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperationEditAkun2').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
});
</script>

<!-- KontrolValidasi #formTambahAkun -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 10), '+', randomNumber(1, 10), '='].join(' '));
	
    $('#formTambahAkun').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			idlogin: {
				row: '.col-md-6',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Nama Pengguna" !'
                    },
                }
            },
			pwdlogin: {
				row: '.col-md-6',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Kata Sandi" !'
                    },
                }
            },
			lvl: {
				row: '.col-xs-5',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memilih "Hak Akses" !'
                    },
                }
            },
			ft: {
				row: '.col-md-8',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Foto" !'
                    },
                }
            },
			captcha: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
});
</script>


<!-- KontrolValidasi #formTambahSuratMasuk -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationTambahSuratMasuk').html([randomNumber(1, 10), '+', randomNumber(1, 20), '='].join(' '));
	
    $('#formTambahSuratMasuk').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			no_urutm: {
				row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "No. Urut" !'
                    },
                }
            },
			no_agd: {
				row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "No. Agenda" !'
                    },
                }
            },
			tgl_msk: {
				row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Tanggal Diterima" !'
                    },
                }
            },
			no_suratm: {
				row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "No. Surat" !'
                    },
                }
            },
			tgl_suratm: {
				row: '.col-md-4',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Tanggal Surat" !'
                    },
                }
            },
			dr_srt: {
				row: '.col-md-6',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Surat Dari" !'
                    },
                }
            },
			isi_srt: {
				row: '.col-md-6',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Perihal Surat" !'
                    },
                }
            },
			captcha: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperationTambahSuratMasuk').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
	
	


});
</script>

<!-- KontrolValidasi #formTambahSuratKeluar -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationTambahSuratKeluar').html([randomNumber(1, 10), '+', randomNumber(1, 10), '='].join(' '));
	
    $('#formTambahSuratKeluar').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			no_urutk: {
				row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "No. Urut" !'
                    },
                }
            },
			no_agdK: {
				row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "No. Agenda" !'
                    },
                }
            },
			tgl_suratk: {
				row: '.col-md-6',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Tanggal Dikirim" !'
                    },
                }
            },
			kpd_srt: {
				row: '.col-md-4',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Surat Kepada" !'
                    },
                }
            },
			no_suratk: {
				row: '.col-md-3',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "No. Surat" !'
                    },
                }
            },
			isi_srt: {
				row: '.col-md-6',
                validators: {
					notEmpty: {
                        message: 'Anda belum memasukkan "Perihal Surat" !'
                    },
                }
            },
			captcha: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperationTambahSuratKeluar').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
	
	


});
</script>

<!-- KontrolValidasi #formPencarianTgl -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationPencarianTgl').html([randomNumber(1, 10), '+', randomNumber(1, 10), '='].join(' '));
	
    $('#formPencarianTgl').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			cari_tgl: {
				row: '.col-md-7',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "Tanggal" !'
                    },
                }
            },
			captcha: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperationPencarianTgl').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
	
	


});
</script>

<!-- KontrolValidasi #formPencarianNo -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationPencarianNo').html([randomNumber(1, 10), '+', randomNumber(1, 10), '='].join(' '));
	
    $('#formPencarianNo').formValidation({
        message: 'Nilai ini tidak valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			cari_no: {
				row: '.col-md-7',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memasukkan "No. Surat / No. Agenda" !'
                    },
                }
            },
			captcha: {
				row: '.col-md-3',
                validators: {
                    callback: {
                        message: 'Jawaban Salah',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperationPencarianNo').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
        }
    });
	
	


});
</script>

<script>
window.setInterval(function(){
  cekTgl();
}, 5000);
function cekTgl() {
    $('#formTambahSuratMasuk')
            .formValidation('revalidateField', 'no_urutm')
			.formValidation('revalidateField', 'no_agd')
			.formValidation('revalidateField', 'tgl_msk')
			.formValidation('revalidateField', 'no_suratm')
			.formValidation('revalidateField', 'dr_srt')
			.formValidation('revalidateField', 'isi_srt')
            .formValidation('revalidateField', 'tgl_suratm');

	$('#formTambahSuratKeluar')
			.formValidation('revalidateField', 'no_urutk')
			.formValidation('revalidateField', 'no_agdK')
			.formValidation('revalidateField', 'no_suratk')
			.formValidation('revalidateField', 'isi_srt')
			.formValidation('revalidateField', 'kpd_srt')
            .formValidation('revalidateField', 'tgl_suratk');
			
	$('#formPencarianTgl')
			.formValidation('revalidateField', 'cari_tgl');
	$('#formPencarianNo')
			.formValidation('revalidateField', 'cari_no');
}
</script>


<script type="text/javascript">
   
	$('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

	$('.form_date2').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	
</script>

</html>

<script>
(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById('time').innerHTML ="Pukul : " + h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
</script>

<script type="text/javascript">
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

<!-- Cek Duplikasi Surat Masuk! -->
<script>
function btnTampil(){
  $("#dwCek").removeClass('hidden');
  myLoop2();
};

$( "#dw" ).change(function() {
  $("#dwCek").addClass('hidden');
  var a = $("#dwVal").val();
  $("#no_agd").val(a);
});
</script>

<!-- Cek Duplikasi Surat Keluar! -->
<script>
function btnTampil2(){
  $("#dwKCek").removeClass('hidden');
  myLoop2();
};

$( "#dwK" ).change(function() {
  $("#dwKCek").addClass('hidden');
  var a = $("#dwKVal").val();
  $("#no_agdK").val(a);
});
</script>
