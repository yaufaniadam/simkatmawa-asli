<!--Main layout-->
<main>

	<!--alert-->
	<?php
	$data=$this->session->flashdata('success');
	if($data!=""){ ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> <?=$data;?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><br/>
	<?php } ?>
	<?php
	$data2=$this->session->flashdata('error');
	if($data2!=""){ ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> <?=$data2;?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><br/>
	<?php } ?>
	<!--alert-->
	
	<div class="container-fluid">

		<!--Section: Modals-->
		<section class="mb-5">
		</section>
		<!--Section: Modals-->


		<!--Section: Accordion-->
		<section class="mb-5">

			<!--Accordion wrapper-->
			<div class="md-accordion accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

				<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
				<!-- Accordion card -->
				<div class="card">

					<!-- Card header -->
					<div class="card-header header-card" role="tab" id="headingOne">

						<!-- Heading -->
						<h5 class="mt-1 mb-0" >
							<span >Tambah Prestasi Mandiri</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>

				</div>

				<!-- Card body -->
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">

						<?php echo form_open_multipart('Transaksi/tambah_mandiri'); ?>


						<div class="card-body d-sm-flex justify-content-between">
							
							<div class="container">
								<div class="row">									
									<div class="col-sm">

										<label class="label_dropdown">Jenis Pengajuan</label>
										<?php echo cmb_dinamis('jenis-pengajuan', 'Mstr_Jenis_Pengajuan', 'Jenis_Pengajuan', 'Jenis_Pengajuan_Id') ?>

										<label class="label_dropdown">Capaian Prestasi</label>
										<?php echo cmb_dinamis('capaian-prestasi', 'Mstr_Capaian_Prestasi', 'Capaian_Prestasi', 'Capaian_Prestasi_Id') ?>
										
										<label class="label_dropdown">Tingkat Prestasi</label>
										<?php echo cmb_dinamis('tingkat-prestasi', 'Mstr_Tingkat_Prestasi', 'Tingkat_Prestasi', 'Tingkat_Prestasi_Id') ?>

										<div class="md-form form-sm">
											<input type="text" id="input2" name="nama-tim" value="" maxlength="50" class="form-control form-control-sm" >
											<label for="input2">Nama Tim Pelaksana</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input4" name="nama-lomba"  value="" maxlength="50" class="form-control form-control-sm" required>
											<label for="input4">Nama Lomba</label>
										</div>

										<div class="md-form form-sm">
											<textarea id="form7" class="md-textarea form-control" name="deskripsi" maxlength="250" rows="3" required></textarea>
											<label for="form7">Deskripsi</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input5" name="instansi"  value="" maxlength="50" class="form-control form-control-sm" required>
											<label for="input5">Instansi Penyelenggara</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input6" name="lokasi"  value="" maxlength="50" class="form-control form-control-sm" required>
											<label for="input6">Lokasi Lomba</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input7" name="url"  value="" maxlength="50" class="form-control form-control-sm" required>
											<label for="input7">Url Penyelenggara</label>
										</div>

										<label class="label_dropdown">Kategori Kegiatan</label>
										<?php echo cmb_dinamis('kategori-kegiatan', 'Mstr_Kategori_Kegiatan', 'Kategori_Kegiatan', 'Kategori_Kegiatan_Id') ?>

										<label for="tgl_mulai">Tanggal Mulai</label>
										<input type="text" id="tgl_mulai" name="tgl-mulai" class="form-control">

										<label for="tgl_mulai">Tanggal Selesai</label>
										<input type="text" id="tgl_selesai" name="tgl-selesai" class="form-control">


										<div class="md-form form-sm">
											<input type="text" id="input3" maxlength="4" name="tahun-prestasi" value="" class="form-control form-control-sm" onkeypress="return hanyaAngka(event)" required>
											<label for="input3">Tahun Perolehan Prestasi</label>
										</div>

										


										<label for="exampleForm2">Upload Sertifikat</label>
										<input type="file" id="exampleForm2" name="input-file"   class="form-control"></br>

										<label for="exampleForm3">Upload Bukti Delegasi</label>
										<input type="file" id="exampleForm3" name="input-file-1"  class="form-control"></br>

										<label for="exampleForm4">Upload Foto Penyerahan Prestasi</label>
										<input type="file" id="exampleForm4" name="input-file-2"   class="form-control"></br>

										<label for="exampleForm3">Upload Foto Kegiatan</label>
										<input type="file" id="exampleForm3" name="input-file-3"  class="form-control"></br>



										<div class="modal-footer">
											<a href="<?php echo base_url('Transaksi/mandiri'); ?>" role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Kembali</a>
											<button type="submit" class="btn btn-primary bg-umy" >Simpan</button>

										</div>

									</div>

								</div>
							</div>

						</div>

						<?php echo form_close(); ?>





					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

		</div>
		<!--/.Accordion wrapper-->

	</section>
	<!--Section: Accordion-->

</div>
</main>
<!--Main layout-->


<script>
	/*jslint browser:true*/
	/*global jQuery, document*/

	$('#tgl_mulai, #tgl_selesai').datetimepicker({
		format:'d-m-Y',
		timepicker:false,
		datepicker:true,
		weeks:false,

	});

	jQuery(document).ready(function () {
		'use strict';


		jQuery('#tgl_mulai, #tgl_selesai').datetimepicker();
	});
</script>

<script type="text/javascript">

	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

			return false;
		return true;
	}

	function hanyaHuruf(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

			return true;
		return false;
	}
</script>