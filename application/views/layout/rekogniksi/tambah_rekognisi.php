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
							<span >Tambah Bidang Rekognisi (Prestasi Non-Lomba & Non-Kejuaraan)</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>

				</div>

				<!-- Card body -->
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">

						<?php echo form_open_multipart('Transaksi/tambah_rekognisi'); ?>


						<div class="card-body d-sm-flex justify-content-between">
							
							<div class="container">
								<div class="row">									
									<div class="col-sm">
										<div class="md-form form-sm">
											<?php $nim=$this->session->userdata('STUDENTID'); ?>

											<input type="text" id="input1" name="id-student" maxlength="20" value="<?=$nim;?>" class="form-control form-control-sm" readonly>
											<label for="input1">NIM</label>
										</div>

										
										<label class="label_dropdown">Jenis Rekognisi</label>
										<?php echo cmb_dinamis('jenis-rekonigsi', 'Mstr_Jenis_Rekognisi', 'Jenis_Rekognisi', 'Jenis_Rekognisi_Id') ?>
										

										<div class="md-form form-sm">
											<input type="text" id="input2" name="nama-karya" value="" maxlength="50" class="form-control form-control-sm" required>
											<label for="input2">Nama Karya</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input3" maxlength="4" name="tahun-pengajuan" maxlength="4" value="" class="form-control form-control-sm" onkeypress="return hanyaAngka(event)" required>
											<label for="input3">Tahun Pengajuan</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input4" name="no-registrasi" maxlength="50"  value="" class="form-control form-control-sm" required>
											<label for="input4">Nomor Registrasi</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input5" name="no-hak-cipta" maxlength="50"  value="" class="form-control form-control-sm" required >
											<label for="input5">Nomor Pencatatan Hak Cipta</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input6" name="url"  value="" maxlength="255" class="form-control form-control-sm" >
											<label for="input6">Url</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input7" name="url-penyelenggara"  maxlength="255" value="" class="form-control form-control-sm" >
											<label for="input7">Url Penyelenggara</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input8" name="url-penyelenggara-kegiatan" maxlength="255"  value="" class="form-control form-control-sm" >
											<label for="input8">Url Publikasi Penyelenggaraan Kegiatan</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input9" name="url-bukti-keikutsertaan"  maxlength="255" value="" class="form-control form-control-sm" >
											<label for="input9">Url Bukti Keikutsertaan</label>
										</div>

										<label for="exampleForm2">Upload Dokumentasi Kegiatan</label>
										<input type="file" id="exampleForm2" name="input-file"   class="form-control"></br>

										<label for="exampleForm3">Upload Prociding Conference</label>
										<input type="file" id="exampleForm3" name="input-file-1"   class="form-control"></br>

										<label for="exampleForm4">Upload Bukti Karya</label>
										<input type="file" id="exampleForm4" name="input-file-2"   class="form-control">

										<div class="modal-footer">
											<a href="<?php echo base_url('Transaksi/rekognisi'); ?>" role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Kembali</a>
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