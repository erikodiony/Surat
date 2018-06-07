<html>
<?php
	include('../../Scripts/connect.php');
		$no_urutm = mysql_real_escape_string($_GET['no_urutm']);
		$sqlTampil="SELECT * FROM s_masuk WHERE no_urut='".$no_urutm."';";  
		$qryTampil=mysql_query($sqlTampil);  
		$dataTampil=mysql_fetch_array($qryTampil);  
		$no_agdMSeb = $dataTampil['no_agenda'];
     ?> 
<head>
<title>&nbsp ./Aplikasi&nbspSurat&nbsp Dinsosnaker &nbsp- &nbspEdit&nbspSurat&nbspMasuk &nbsp|</title>
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
				<h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>&nbsp Edit Surat Masuk</h4>	
				<div align="left">Harap Masukkan Data dengan Teliti dan Benar!</div>
			</div>
			
			<!-- Modal #ppAwal Body -->
			<div class="modal-body" >

<!-- Menu BuatSuratMasuk -->
				<div role="tabpanel">
											
					<ul class="nav nav-tabs" role="tablist" id="ppSuratBaru">
						<li role="presentation" class="active"><a href="#TabSuratMasuk" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-save"></span>&nbsp Edit Surat Masuk</a></li>
					</ul>
			
					<!-- Tab panes -->
						<div class="tab-content">
							<!-- Tab #ppBuatSurat (Surat Masuk)-->
							<div role="tabpanel" class="tab-pane fade in active" id="TabSuratMasuk">
								<form id="formEditSuratMasuk" class="form-horizontal" action="cekEditSuratMasuk.php" method="post">
									<div class="form-group">
										<label class="col-md-2 control-label">*No. Entri</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_urutm" class="form-control" readonly value="<?php echo $dataTampil['no_urut']; ?>" placeholder="No. Urut..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>

											<label class="col-md-2 control-label">No. Berkas</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_brks" id="no_brks" value="<?php echo $dataTampil['no_berkas']; ?>" class="form-control" placeholder="No. Berkas..">
												<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
												</div>
											</div>
									</div>

									<?php
									$qCekDuplikasi = mysql_query("SELECT t1.no_agenda + 1 FROM s_masuk t1 WHERE NOT EXISTS (SELECT * FROM s_masuk t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda DESC LIMIT 1");
									$dataDup = mysql_fetch_array($qCekDuplikasi);
									$noDup = $dataDup['t1.no_agenda + 1'];
									?>
									
									<div class="form-group">
											<label class="col-md-2 control-label">*No. Agenda</label>
											<div class="col-md-3 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="no_agd" id="no_agd" class="form-control" value="<?php echo $dataTampil['no_agenda']; ?>" placeholder="No. Agenda..">
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
															<option value="<?php echo $dataTampil['no_agenda']; ?>" label="<?php echo $dataTampil['no_agenda']; ?>"><?php echo $dataTampil['no_agenda']; ?></option>
															<option class="divider" disabled></option>															
																<?php 
																$qCekDuplikasi2 = mysql_query("SELECT t1.no_agenda + 1 FROM s_masuk t1 WHERE NOT EXISTS (SELECT * FROM s_masuk t2 WHERE t2.no_agenda = t1.no_agenda + 1)ORDER BY no_agenda ASC");
																while ($dataTampilM=mysql_fetch_array($qCekDuplikasi2)) { 
																?>
															<option value="<?php echo $dataTampilM['t1.no_agenda + 1']?>" label="<?php echo $dataTampilM['t1.no_agenda + 1']?>"><?php echo $dataTampilM['t1.no_agenda + 1']?></option>
																<?php } ?>
														</select>
												</div>
											</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Isi Disposisi</label>
											<div class="col-md-6 inputGroupContainer">
												<textarea class="form-control" name="isi_dps" rows="6" placeholder="Isi Disposisi.."><?php echo $dataTampil['isi_disposisi']; ?></textarea>
											</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">*Tanggal Diterima</label>
											<div class="col-md-4 inputGroupContainer">
												<div class="input-group date form_date" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
										        <input readonly type="text" onfocus="cekTgl()" name="tgl_msk" id="tgl_msk" class="form-control" placeholder="Tanggal Diterima.." value="<?php echo $dataTampil['tgl_terima']; ?>">
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
												<input type="text" name="no_suratm" id="no_suratm" class="form-control" placeholder="No. Surat.." value="<?php echo $dataTampil['srt_no']; ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
												</div>
											</div>
											<label class="col-md-2 control-label">*Tanggal Surat</label>
											<div class="col-md-4 inputGroupContainer">
												<div class="input-group date form_date2" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd">
										        <input readonly onfocus="cekTgl()" type="text" name="tgl_suratm" id="tgl_suratm" class="form-control" placeholder="Tanggal Surat.." value="<?php echo $dataTampil['srt_tgl']; ?>">
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										        </div>
											</div>	
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">*Surat Dari</label>
											<div class="col-md-6 inputGroupContainer">
												<div class="input-group">
												<input type="text" name="dr_srt" id="dr_srt" class="form-control" placeholder="Surat Dari.." value="<?php echo $dataTampil['srt_dari']; ?>">
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
												<textarea class="form-control" name="hide_agd" rows="6" placeholder=""><?php echo $no_agdMSeb ?></textarea>
											</div>
									</div>
									
									<label class="col-md-3 control-label">*) Wajib diisi</label>
									<br></br>
									<div class="form-group">
										<label class="col-md-3 control-label" id="captchaOperationEditSuratMasuk"></label>
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
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="window.location.href = 'cekAutentikasi.php'"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Konfig Validasi #FormEdit -->
<style type="text/css">
#FormEdit .inputGroupContainer .form-control-feedback,
#FormEdit .selectContainer .form-control-feedback {
    top: 0;
    right: -20px;
}
</style>

<!-- Judul Marquee -->
<script>
(function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();
</script>

<script> 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperationEditSuratMasuk').html([randomNumber(1, 5), '+', randomNumber(1, 5), '='].join(' '));
	
    $('#formEditSuratMasuk').formValidation({
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
                            var items = $('#captchaOperationEditSuratMasuk').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
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
    $('#formEditSuratMasuk')
            .formValidation('revalidateField', 'no_urutm')
			.formValidation('revalidateField', 'no_agd')
			.formValidation('revalidateField', 'tgl_msk')
			.formValidation('revalidateField', 'no_suratm')
			.formValidation('revalidateField', 'dr_srt')
			.formValidation('revalidateField', 'isi_srt')
            .formValidation('revalidateField', 'tgl_suratm');
		
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

</html>