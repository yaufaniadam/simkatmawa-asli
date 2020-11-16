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
							<span >Detail Bidang Student Exchange</span>
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
											<tr>
												<td width="30%">NIM</td>
												<td width="70%">: <?=$exchange['Nim'];?></td>
											</tr>
		
											<tr>
												<td>Nama Program Kegiatan</td>
												<td>: <?=$exchange['Nama_Program_Kegiatan'];?></td>
											</tr>
											<tr>
												<td>Tahun Pelaksanaan</td>
												<td>: <?=$exchange['Tahun_Pelaksanaan'];?></td>
											</tr>
			

											<tr>
												<td>Dokumen Pendukung</td>
												<td>: <?php if($exchange['Upload_Dokumen_Pendukung']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_3/'.$exchange['Upload_Dokumen_Pendukung']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
													<?php } ?></td>
												</tr>

												<tr>
													<td>Foto Kegiatan</td>
													<td>: <?php if($exchange['Upload_Foto_Kegiatan']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_3/'.$exchange['Upload_Foto_Kegiatan']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
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
