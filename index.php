<!DOCTYPE html>
<html>
<head>
  <title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspSelamat &nbspDatang &nbsp|</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <link rel="icon" type="image/png" href="Images/Logo.png">
  <link rel="stylesheet" href="Scripts/Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="Scripts/FakeLoader/fakeLoader.css">
  <script type="text/javascript" src="Scripts/jquery.js"></script>
  <script type="text/javascript" src="Scripts/Bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Scripts/FakeLoader/fakeLoader.min.js"></script>
	
<!-- Judul Marquee -->
<script>
(function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();
</script>

<!-- FakeLoader -->
<script>
    $(document).ready(function(){
        $(".fakeloader").fakeLoader({
            timeToHide:3000,
            bgColor:"#996633",
            spinner:"spinner2"
          });
       });
</script>

<!-- Tampil Modal #ppAwal -->
<script type="text/javascript">
		$(document).ready(function() {
    setTimeout(function() {
      $('#ppAwal').modal('show');
    }, 4500);
});
</script>

<!-- Konfig Carousel #gambargerak -->
<script type="text/javascript">
  var $ = jQuery.noConflict();
  $(document).ready(function() { 
      $('#gambargerak').carousel({ interval: 4000, cycle: true });
  }); 
</script>

<!-- Konfig Halaman -->
<style type="text/css">
	body {background: #000000 url('Images/bg.jpg') no-repeat center top;}
	form {background: #ffffff; height:100%; margin: 10;}
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
	h3 img {
	margin-left:30px;
			}
	.panel {box-shadow: none;}
</style>

<!-- Konfig Carousel #gambargerak -->
<style type="text/css">
.item{
    text-align: center;
    width: auto;
}
.ukuran {
height: 300px;
}
.carousel {
width:100%;
margin:0 auto; 
}
</style>
</head>

<body>
<div class="fakeloader"></div>
<!-- Modal #ppAwal -->
<div class="modal fade" id="ppAwal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content col-lg-12">
			
			<!-- Modal #ppAwal Header -->
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">
				<table align="center">
					<tr>
						<h4 align="center"><img src="Images/logo.png" alt="Logo" width="70" height="70">&nbsp Aplikasi Pengelolaan Surat DINSOSNAKER Kota Kediri (Berbasis Web)</h4>
					</tr>
				</table>
				</h4>
			</div>
			
			<!-- Modal #ppAwal Body -->
			<div class="modal-body">
				<div class="col-md-6">
					<div id="gambargerak" class="carousel slide" data-interval="4000">
  
					<!-- Indikator Carousel #gambargerak -->
					<ol class="carousel-indicators">
						<li data-target="#gambargerak" data-slide-to="0" class="active"></li>
						<li data-target="#gambargerak" data-slide-to="1"></li>
						<li data-target="#gambargerak" data-slide-to="2"></li>
						<li data-target="#gambargerak" data-slide-to="3"></li>
						<li data-target="#gambargerak" data-slide-to="4"></li>
						<li data-target="#gambargerak" data-slide-to="5"></li>
						<li data-target="#gambargerak" data-slide-to="6"></li>
						<li data-target="#gambargerak" data-slide-to="7"></li>
					</ol>

					<!-- Isi Carousel #gambargerak -->
					<div class="carousel-inner">
						<div class="item active">
							<div style="background:url(Images/gambar.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Patung Mayor Bismo (Syodancho Bismo)</h4>
								</div>
						</div>
						<div class="item">
							<div style="background:url(Images/gambar1.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Kantor Walikota Kediri</h4>
								</div>
						</div>
						<div class="item">
							<div style="background:url(Images/gambar2.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Gerbang "Selamat Datang"</h4>
								</div>
						</div>
						<div class="item">
							<div style="background:url(Images/gambar3.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Jalan Dhoho</h4>
								</div>
						</div>
						<div class="item">
							<div style="background:url(Images/gambar4.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Masjid Agung</h4>
								</div>
						</div>
						<div class="item">
							<div style="background:url(Images/gambar5.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Goa Selomangleng</h4>
								</div>
							</div>
						<div class="item">
							<div style="background:url(Images/gambar6.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Pasar Bandar</h4>
								</div>
						</div>
						<div class="item">
							<div style="background:url(Images/gambar7.jpg) center center; background-size:cover;" class="ukuran">
							</div>
								<div class="carousel-caption" style="color:yellow">
									<h4>Kantor Dinsosnaker</h4>
								</div>
						</div>
					</div>

					<!-- Kontrol Carousel #gambargerak -->
					<a class="left carousel-control" href="#gambargerak" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#gambargerak" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					
					</div>
				</div>
			</div>
			
			<!-- Modal #ppAwal Isi -->
			<div>
				<h4 align="center"><strong>Selamat Datang!</strong>
				</h4> 
					<h5>Ini adalah <strong>"Aplikasi Pengelolaan Surat DINSOSNAKER Kota Kediri (Berbasis Web)"</strong> yang mana <b>terdiri atas:</b> 
						<h4>
							<div class="panel">
							<label>Pencatatan Surat Masuk</label></br>
							<label>Pencatatan Surat Keluar</label></br>
							<label>Mencetak Lembar Disposisi</label></br>
							<label>Mengarsip Data Surat - Surat</label></br>
							</div>														
						</h4>
						Silahkan Login ke sistem untuk menggunakan aplikasi ini secara maksimal!
					</h5>
				<br><br>
				<h4 align="center"><a href="Login/"><button class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp Masuk Sebagai Admin / User</button></a></h4>
			</div>
			<br><br>
			
			<!-- Modal #ppAwal Footer -->
			<div class="modal-footer">
				<h5 align="center"><b>PEMERINTAH KOTA KEDIRI</b></h5>
				<h5 align="center"><b>DINAS SOSIAL DAN TENAGA KERJA</b></h5>
				<h5 align="center">JL. Brigjen Imam Bachkri No.115 Telp.(0354) 697453</h5>
				<h5 align="center">Email : dinsosnakerkotakediri@ymail.com</h5>
			<br><br>
			<h6 align="right"><b><a href="http://ngezz.tk" target="blank" style="text-decoration: none">PKL-TI (UNPKediri-2015)</a></b></h6>
			</div>
				
			
		</div>
	</div>
</div>

</body>
</html>