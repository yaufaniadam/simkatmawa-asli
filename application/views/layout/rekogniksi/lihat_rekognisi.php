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
							<span >Detail Bidang Rekognisi (Prestasi Non-Lomba & Non-Kejuaraan)</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>

				</div>

				<!-- Card body -->
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">



						<div class="card-body d-sm-flex justify-content-between">

							<div style="width: 100%; overflow: scroll;">

								<div class="container">
									<div class="row">									
										<div class="col-sm">
											<table width="100%" border="0">
											<!-- <tr>
												<td width="30%">NIM</td>
												<td width="70%">: <</td>
											</tr> -->
											<tr>
												<td width="30%">Jenis Rekonigsi</td>
												<td width="70%">: <?=$rekognisi['Jenis_Rekognisi'];?></td>
											</tr>
											<tr>
												<td>Nama Karya</td>
												<td>: <?=$rekognisi['Nama_Karya'];?></td>
											</tr>
											<tr>
												<td>Tahun Pengajuan</td>
												<td>: <?=$rekognisi['Tahun_Pengajuan'];?></td>
											</tr>

											<tr>
												<td>Nomor Registrasi</td>
												<td>: <?=$rekognisi['Nomor_Registrasi'];?></td>
											</tr>
											<tr>
												<td>Nomor Pencatatan Hak Cipta</td>
												<td>: <?=$rekognisi['Nomor_Pencatatan_Hak_Cipta'];?></td>
											</tr>
											<tr>
												<td>Url</td>
												<td>: <a href="<?=$rekognisi['Url'];?>"><?=$rekognisi['Url'];?></a></td>
											</tr>

											<tr>
												<td>Url Penyelenggara</td>
												<td>: <a href="<?=$rekognisi['Url_Penyelenggara'];?>"> <?=$rekognisi['Url_Penyelenggara'];?></a></td>
											</tr>
											<tr>
												<td>Url Publikasi Penyelenggaraan Kegiatan</td>
												<td>: <a href="<?=$rekognisi['Url_Publikasi_Penyelenggaraan_Kegiatan'];?>"> <?=$rekognisi['Url_Publikasi_Penyelenggaraan_Kegiatan'];?></a></td>
											</tr>
											<tr>
												<td>Url Bukti Keikutsertaan</td>
												<td>: <a href="<?=$rekognisi['Url_Bukti_Keikutsertaan'];?>"><?=$rekognisi['Url_Bukti_Keikutsertaan'];?></a></td>
											</tr>

											<tr>
												<td>Dokumentasi Kegiatan</td>
												<td>: <?php if($rekognisi['Upload_Dokumentasi_Kegiatan']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed/'.$rekognisi['Upload_Dokumentasi_Kegiatan']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
													<?php } ?></td>
												</tr>

												<tr>
													<td>Prociding Conference</td>
													<td>: <?php if($rekognisi['Upload_Prociding_Conference']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed/'.$rekognisi['Upload_Prociding_Conference']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
														<?php } ?></td>
													</tr>

													<tr>
														<td>Bukti Karya</td>
														<td>: <?php if($rekognisi['Upload_Bukti_Karya']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed/'.$rekognisi['Upload_Bukti_Karya']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
															<?php } ?></td>
														</tr>

													</table>

												</div>

											</div>

										</div>
									</div>

								</div>




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
