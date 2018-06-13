<!DOCTYPE html>
<html>
<head>
  <title>&nbsp ./Aplikasi&nbspSurat Dinsosnaker &nbsp- &nbspLupa Kata Sandi &nbsp|</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <link rel="icon" type="image/ico" href="favicon.ico">
  <link rel="stylesheet" href="../Scripts/Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Scripts/Validator/css/formValidation.css"/>
  <link rel="stylesheet" href="../Scripts/FakeLoader/fakeLoader.css">
  <script type="text/javascript" src="../Scripts/jquery.js"></script>
  <script type="text/javascript" src="../Scripts/Bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Scripts/Tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="../Scripts/Validator/js/formValidation.js"></script>
  <script type="text/javascript" src="../Scripts/Validator/js/framework/bootstrap.js"></script>
  <script type="text/javascript" src="../Scripts/jquery.bootstrap.wizard.min.js"></script>
  <script type="text/javascript" src="../Scripts/FakeLoader/fakeLoader.min.js"></script>

<!-- Judul Marquee -->
<script>
(function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();
</script>

<script type="text/javascript">
		$(document).ready(function() {
    setTimeout(function() {
      $('#ppAwal').modal('show');
    }, 3500);
});
	</script>
<style type="text/css">
	body {background: #000000 url('../Images/bg.jpg') no-repeat center top;}
	form {background:url('../Images/bg-transparent.png') repeat top center; height:100%; margin: 10;}
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
		margin-top: 1px;
		margin-bottom:8px;
		}
	h3 {margin-top:10px;}
</style>

<style type="text/css">
#loginpgw .inputGroupContainer .form-control-feedback,
#loginpgw .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
</style>
</head>
<body>
<div class="fakeloader"></div>

<!-- Modal #ppAwal -->
<div class="modal fade" id="ppAwal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><b>Lupa Kata Sandi</b></h4>
      </div>
      <div class="modal-body">
       <h4>Harap Masukkan <strong>Nama Pengguna</strong> dan <strong>Hak Akses</strong> Anda yang telah terdaftar!</h4> 
	   <h5><strong>Apabila Berhasil,</strong> maka Otomatis Sistem akan memunculkan Kata Sandi Anda! ^_^</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
	<div class="col-lg-8 col-lg-offset-2">
  
	<form id="loginpgw" class="form-horizontal col-lg-12" action="cekLupaKataSandi.php" method="post">

  <table align="center">
    <tr>
      <h4 align="center"><img src="../Images/logo.png" alt="Logo" width="70" height="70">&nbsp Aplikasi Pengelolaan Surat DINSOSNAKER Kota Kediri</h4>
    </tr>
    <tr>
      <hr>
    </tr>
    <tr>
      <h3 align="center">Lupa Kata Sandi</h3> 
    </tr>
  </table>

		<div class="form-group">
			<label class="col-md-3 control-label">Nama Pengguna</label>
			<div class="col-md-6 inputGroupContainer">
				<div class="input-group">
				<input type="text" name="idlogin" class="form-control" placeholder="Nama Pengguna">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				</div>
			</div>
		</div>
   
		<div class="form-group">
			<label class="col-md-3 control-label">Hak Akses</label>
			<div class="col-md-4 selectContainer">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
					<select class="form-control" name="level">
						<option value="" selected>Pilih Hak Akses</option>
						<option class="divider" disabled></option>
						<option value="Admin">Admin</option>
						<option value="User">User</option>
					</select>
				</div>
			</div>
		</div>   
  
		<div class="form-group">
			<label class="col-md-3 control-label" id="captchaOperation"></label>
			<div class="col-md-2 inputGroupContainer">
				<input type="text" class="form-control" name="captcha" />
			</div>
		</div>
  
		<div class="form-group">
			<label class="col-md-offset-3 col-md-9">Masuk ke Sistem ?? klik <a style="text-decoration:none" href="../Login">disini</a></label>
		</div> 
  
		<div class="form-group">
			<div class="col-md-offset-3 col-md-9">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp Cek Kata Sandi</button>
			</div>
		</div>
	</form>
	</div>
</div>



<script> <!--KontrolValidasi-->
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 10), '+', randomNumber(1, 20), '='].join(' '));
	
    $('#loginpgw').formValidation({
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
            level: {
				row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Anda belum memilih "Hak Akses" !'
                    }
                }
            },
			captcha: {
				row: '.col-md-2',
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
<script> <!--KontrolFakeLoader-->
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:2000,
                    bgColor:"#996633",
                    spinner:"spinner2"
                });
            });
</script>
</body>
</html>