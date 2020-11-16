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
							<span >Tambah Pengabdian Masyarakat</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>

				</div>

				<!-- Card body -->
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">

						<?php echo form_open_multipart('Transaksi/edit_pengabdian'); ?>


						<div class="card-body d-sm-flex justify-content-between">
							
							<div class="container">
								<div class="row">									
									<div class="col-sm">
										

										<div class="md-form form-sm">
											<input type="hidden" name="id-pengabdian" value="<?=$pengabdian['Pengabdian_Id'];?>" maxlength="50" class="form-control form-control-sm" required>
											<input type="text" id="input2" name="judul" value="<?=$pengabdian['Judul_Pengabdian'];?>" maxlength="50" class="form-control form-control-sm" required>
											<label for="input2">Judul Pengabdian</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input4" name="kelompok-sasaran"  value="<?=$pengabdian['Kelompok_Sasaran'];?>" maxlength="50" class="form-control form-control-sm" required>
											<label for="input4">Kelompok Sasaran</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input5" name="organisasi-pelaksana"  value="<?=$pengabdian['Nama_Organisasi_Pelaksana'];?>" maxlength="50" class="form-control form-control-sm" required>
											<label for="input5">Nama Organisasi Pelaksana</label>
										</div>

										<div class="md-form form-sm">
											<input type="text" id="input3" maxlength="4" name="tahun-kegiatan" value="<?=$pengabdian['Tahun_Kegiatan'];?>" class="form-control form-control-sm" onkeypress="return hanyaAngka(event)" required>
											<label for="input3">Tahun Kegiatan</label>
										</div>

										
										<div class="md-form form-sm">
											<input type="text" id="input6" name="jumlah-mahasiswa"  value="<?=$pengabdian['Jumlah_Mahasiswa'];?>" maxlength="30" class="form-control form-control-sm" onkeypress="return hanyaAngka(event)" required >
											<label for="input6">Jumlah Mahasiswa</label>
										</div>


										<label for="exampleForm2">Upload Bukti Keikutsertaan</label>
										<input type="text" name="input-file-a" value="<?=$pengabdian['Upload_Bukti_Keikutsertaan'];?>"  class="form-control">
										<input type="file" id="exampleForm2" name="input-file"   class="form-control"></br>

										<label for="exampleForm3">Upload Laporan Pengabdian</label>
										<input type="text"  name="input-file-a-1" value="<?=$pengabdian['Upload_Laporan_Pengabdian'];?>"  class="form-control">
										<input type="file" id="exampleForm3" name="input-file-1"  class="form-control"></br>


										<div class="modal-footer">
											<a href="<?php echo base_url('Transaksi/pengabdian'); ?>" role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Kembali</a>
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