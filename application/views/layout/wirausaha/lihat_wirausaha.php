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
							<span >Detail kelompok Wirausaha</span>
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
													<td width="30%">Nama Usaha</td>
													<td width="70%">: <?=$wirausaha['Nama_Usaha'];?></td>
												</tr>
												<tr>
													<td>Deskripsi Usaha</td>
													<td>: <?=$wirausaha['Deskripsi_Usaha'];?></td>
												</tr>
												<tr>
													<td>Program Kegiatan Pembinaan Kewirausahaan</td>
													<td>: <?=$wirausaha['Program_Kegiatan_Pembinaan_Kewirausahaan'];?></td>
												</tr>

												<tr>
													<td>Tahun Pendirian Usaha</td>
													<td>: <?=$wirausaha['Tahun_Pendirian_Usaha'];?></td>
												</tr>
												<tr>
													<td>Omset Perbulan</td>
													<td>: <?=$wirausaha['Omset_Perbulan'];?></td>
												</tr>

												<tr>
													<td>Proposal Bisnis</td>
													<td>: <?php if($wirausaha['Upload_Proposal_Bisnis']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_1/'.$wirausaha['Upload_Proposal_Bisnis']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
														<?php } ?></td>
													</tr>

													<tr>
														<td>Foto Usaha</td>
														<td>: <?php if($wirausaha['Upload_Foto_Usaha']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_1/'.$wirausaha['Upload_Foto_Usaha']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
															<?php } ?></td>
														</tr>

														<tr>
															<td>Legalitas Usaha</td>
															<td>: <?php if($wirausaha['Upload_Legalitas_Usaha']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_1/'.$wirausaha['Upload_Legalitas_Usaha']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
																<?php } ?></td>
															</tr>

															<tr>
																<td>Bukti Usaha</td>
																<td>: <?php if($wirausaha['Upload_Bukti_Usaha']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_1/'.$wirausaha['Upload_Bukti_Usaha']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
																	<?php } ?></td>
																</tr>

															</table>

														</div>


														<div class="col-sm">

															<?php 
															$owner=$wirausaha['Owner'];
															$student_id=$this->session->userdata('STUDENTID'); 

															if ($owner==$student_id) {
																?>
																<a href="<?php echo base_url();?>Transaksi/input_anggota_wirausaha_1/<?=encrypt_url($wirausaha['Kelompok_Wirausaha_Id']);?>" class="btn btn-primary btn-sm bt-add bg-umy" style="float: right;" >Tambah Angota</a>

																<?php
															} ?>

															

														</br></br>

														<table class="table table-striped table-bordered" cellspacing="0" width="100%">
															<thead class="text-tabel header_tabel">
																<tr>
																</th>
																<th class="th-sm"><center>Informasi Anggota</center>
																</th>
															</tr>
														</thead>
														<tbody>
															<?php $no=0; foreach($anggota as $row): $no++; ?>
															<tr>
																<td>
																	<b>No</b>: <?php echo $no; ?><br>
																	<b>NIM</b>: <?php echo $row->Nim; ?><br>
																	<b>Nama</b>: <?php echo $row->FULLNAME; ?><br>
																	<b>Peran </b>: <?php $peran=$row->Is_Ketua; if($peran==1){echo "Ketua";}else{echo "Anggota";}?><br>
																	<b>No Hp </b>: <?php echo $row->No_Hp; ?><br>

																	<?php 
																	if ($owner==$student_id) {
																		$display='style=" display: block;"';
																		?>
																		<a href="<?php echo site_url('Transaksi/edit_anggota_wirausaha/'.encrypt_url($row->Nim).'/'.encrypt_url($row->Kelompok_Wirausaha_Id)); ?>" class="btn btn-success btn-sm btn-rounded btn-edit" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Ubah</i></a>

																		<a href="<?php echo site_url('Transaksi/hapus_anggota_wirausaha/'.encrypt_url($row->Kelompok_Wirausaha_Member_Id).'/'.encrypt_url($row->Kelompok_Wirausaha_Id)); ?>" class="btn btn-success btn-sm btn-rounded btn-delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini');" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Hapus</i></a>

																		<?php
																	} ?>

																</td>
																
															</tr>
														<?php endforeach; ?>
													</tbody>
													<tfoot>
													</tfoot>
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
