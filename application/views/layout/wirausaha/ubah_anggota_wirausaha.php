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
							<span >Ubah Anggota Kelompok Wirausaha</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>

				</div>

				<!-- Card body -->
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">


						<div class="card-body d-sm-flex justify-content-between">
							
							<div class="container">
								<div class="row">									
									<div class="col-sm">

										<!--Card-->
										<div class="card">

											<!--Card content-->
											<div class="card-body">

												<!-- Grid row -->
												<div class="row">

													<!-- Grid column -->
													<div class="col-md-3 offset-md-1 mx-3 my-3">
														<!-- Featured image -->

														<?php

														$nim = $maha['STUDENTID'];
														$tahun = substr($nim,0,4);

														?>

														<div class="view overlay zoom" style="position: center;">
															<img src="http://krs.umy.ac.id/fotomhs/<?=$tahun;?>/<?=$nim;?>.jpg" class="img-fluid size-img img-thumbnail" alt="Belum Ada Foto">
															<div class="mask flex-center waves-effect waves-light">
															</div>
														</div>
													</div>
													<!-- Grid column -->

													<div class="col-md-3 offset-md-1 ml-3 mt-3">
														<table width="100%" border="0">
															<tr>
																<td width="20%">NIM</td>
																<td width="80%">: <?=$nim;?></td>
															</tr>
															<tr>
																<td>Nama</td>
																<td>: <?=$maha['FULLNAME'];?></td>
															</tr>
															<tr>
																<td>Fakultas</td>
																<td>: <?=$maha['NAME_OF_FACULTY'];?></td>
															</tr>
															<tr>
																<td>Prodi</td>
																<td>: <?=$maha['NAME_OF_DEPARTMENT'];?></td>
															</tr>
														</table>
													</div>

												</div>
												<!-- Grid row -->

											</div>
										</div>
										<!--/.Card-->

									</div>

								</div>
							</div>
							
						</div>




						<?php echo form_open_multipart('Transaksi/ubah_anggota_wirausaha'); ?>


						<div class="card-body d-sm-flex justify-content-between">
							
							<div class="container">
								<div class="row">									
									<div class="col-sm">


										<!--Card-->
										<div class="card">

											<!--Card content-->
											<div class="card-body">

												<input type="hidden"  name="id-usaha" value="<?=$id_usaha;?>" class="form-control form-control-sm" readonly>
												<input type="hidden"  name="nim" value="<?=$nim;?>" class="form-control form-control-sm" readonly>

												<label class="label_dropdown">Peran</label>
												<select name='peran' class='browser-default custom-select' required>
													<option value='<?=$maha['Is_Ketua'];?>'><?php if($maha['Is_Ketua']==1){echo "Ketua";}else{echo "Anggota";}?></option>
													<option value="1">Ketua</option>
													<option value="0">Anggota</option>

												</select>

												<div class="md-form form-sm">
													<input type="text" id="input3" maxlength="15" name="hp" value="<?=$maha['No_Hp'];?>" class="form-control form-control-sm" onkeypress="return hanyaAngka(event)" required>
													<label for="input3">No Hp</label>
												</div>


											</div>
										</div>
										<!--/.Card-->
										


										<div class="modal-footer">
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