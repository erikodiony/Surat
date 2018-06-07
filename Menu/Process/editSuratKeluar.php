<html>
<?php
	include('../../Scripts/connect.php');
		$no_urutk = mysql_real_escape_string($_GET['no_urutk']);
		$sqlTampil="SELECT * FROM s_keluar WHERE no_urut='".$no_urutk."';";  
		$qryTampil=mysql_query($sqlTampil);  
		$dataTampil=mysql_fetch_array($qryTampil);
		$no_agdKSeb = $dataTampil['no_agenda'];
     ?> 
<head>
<title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspEdit&nbspSurat&nbspKeluar &nbsp|</title>
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

<!-- Judul Marquee -->
<script>
(function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();
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
			$('#ppEdit').modal('show');
			$('#ppEdit').data('bs.modal').isShown = true;
		});
	</script>

</head>

<!-- ModalMain #ppEdit -->
<div class="modal fade" id="ppEdit" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static"  aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		
			<!-- Modal #ppBuatSurat Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>&nbsp Edit Surat Keluar</h4>	
				<div align="left">Harap Masukkan Data dengan Teliti dan Benar!</div>
			</div>
			
			<!-- Modal #ppAwal Body -->
			<div class="modal-body" >

<!-- Menu BuatSuratMasuk -->
				<div role="tabpanel">
											
					<ul class="nav nav-tabs" role="tablist" id="ppSuratBaru">
						<li role="presentation" class="active"><a href="#TabSuratKeluar" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-save"></span>&nbsp Edit Surat Keluar</a></li>
					</ul>
			
					<!-- Tab panes -->
						<div class="tab-content">
							<!-- Tab #ppEditSurat (Surat Keluar)-->
							<div role="tabpanel" class="tab-pane fade in active" id="TabSuratKeluar">
							<form id="formEditSuratKeluar" class="form-horizontal" action="cekEditSuratKeluar.php" method="post">
									<div class="form-group">
										<label class="col-md-2 control-label">*No. Entri</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_urutk" class="form-control" readonly value="<?php echo $dataTampil['no_urut']; ?>" placeholder="No. Urut..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>
											<label class="col-md-2 control-label">No. Berkas</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_brks" id="no_brks" class="form-control" placeholder="No. Berkas.." value="<?php echo $dataTampil['no_berkas']; ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
												</div>
											</div>
									</div>
									
									<?php
									$qCekDuplikasiK = mysql_query("SELECT t1.no_agenda + 1 FROM s_keluar t1 WHERE NOT EXISTS (SELECT * FROM s_keluar t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda DESC LIMIT 1");
									$dataDupK = mysql_fetch_array($qCekDuplikasiK);
									$noDupK = $dataDupK['t1.no_agenda + 1'];
									?>
					
									<div class="form-group">
											<label class="col-md-2 control-label">*No. Agenda</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_agdK" id="no_agdK" class="form-control" placeholder="No. Agenda.." value="<?php echo $dataTampil['no_agenda']; ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
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
															<option value="<?php echo $dataTampil['no_agenda']; ?>" label="<?php echo $dataTampil['no_agenda']; ?>"><?php echo $dataTampil['no_agenda']; ?></option>
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
										        	<input type="text" name="tgl_suratk" id="tgl_suratk" class="form-control" placeholder="Tanggal Dikirim.." readonly value="<?php echo $dataTampil['tgl_suratk']; ?>">
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
												<input type="text" name="no_suratk" id="no_suratk" class="form-control" placeholder="No. Surat.." value="<?php echo $dataTampil['srt_no']; ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>
										<label class="col-md-2 control-label">*Surat Kepada</label>
											<div class="col-md-4 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="kpd_srt" id="kpd_srt" class="form-control" placeholder="Surat Kepada.." value="<?php echo $dataTampil['srt_ke']; ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">*Perihal Surat</label>
											<div class="col-md-6 inputGroupContainer">
												<textarea class="form-control" name="isi_srt" rows="6" placeholder="Perihal Surat.."><?php echo $dataTampil['srt_perihal']; ?></textarea>
											</div>
									</div>
									
									<!-- HIDE VARIABEL-->
									<div class="form-group hidden ">
										<label class="col-md-3 control-label"></label>
											<div class="col-md-6 inputGroupContainer">
												<textarea class="form-control" name="hide_agd" rows="6" placeholder=""><?php echo $no_agdKSeb ?></textarea>
											</div>
									</div>

									<label class="col-md-3 control-label">*) Wajib diisi</label>
									<br></br>
									<div class="form-group">
										<label class="col-md-3 control-label" id="captchaOperationEditSuratKeluar"></label>
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
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="window.location.href = 'cekAutentikasi.php';"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Konfig Validasi #FormEdit -->
<style type="text/css">
#formEditSuratKeluar .inputGroupContainer .form-control-feedback,
#formEditSuratKeluar .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
</style>

<!-- KontrolValidasi #formTambahSuratKeluar -->
<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationEditSuratKeluar').html([randomNumber(1, 5), '+', randomNumber(1, 5), '='].join(' '));
	
    $('#formEditSuratKeluar').formValidation({
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
			no_agd: {
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
                            var items = $('#captchaOperationEditSuratKeluar').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
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
   	$('#formEditSuratKeluar')
			.formValidation('revalidateField', 'no_urutk')
			.formValidation('revalidateField', 'no_agd')
			.formValidation('revalidateField', 'no_suratk')
			.formValidation('revalidateField', 'isi_srt')
			.formValidation('revalidateField', 'kpd_srt')
            .formValidation('revalidateField', 'tgl_suratk');

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
</html>