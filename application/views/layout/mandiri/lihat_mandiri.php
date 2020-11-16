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
							<span >Detail Prestasi Mandiri</span>
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
											<?php 
											$owner=$mandiri['Owner'];
											$student_id=$this->session->userdata('STUDENTID'); 
											?>


											<table width="100%" border="0">
												<tr>
													<td width="30%">Dosen Pembimbing</td>
													<td width="70%">: <?=$mandiri['nama'];?>
													<?php $dospem=$mandiri['nama'];
													if ($dospem==null && $owner==$student_id) {
														?>
														<a href="<?php echo site_url('Transaksi/tambah_dospem_1/'.encrypt_url($mandiri['Prestasi_Mandiri_Id'])); ?>" class="btn btn-success btn-sm btn-rounded btn-edit" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Tambah</i></a>
														<?php
													}else if($dospem!=null && $owner==$student_id){
														?>
														<a href="<?php echo site_url('Transaksi/tambah_dospem_1/'.encrypt_url($mandiri['Prestasi_Mandiri_Id'])); ?>" class="btn btn-success btn-sm btn-rounded btn-edit" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Ubah</i></a>
														<?php
													}else{
													} ?>

												</td>
											</tr>
											<tr>
												<td>Jenis Pengajuan</td>
												<td>: <?=$mandiri['Jenis_Pengajuan'];?></td>
											</tr>
											<tr>
												<td>Capaian Prestasi</td>
												<td>: <?=$mandiri['Capaian_Prestasi'];?></td>
											</tr>
											<tr>
												<td>Tingkat Prestasi</td>
												<td>: <?=$mandiri['Tingkat_Prestasi'];?></td>
											</tr>
											<tr>
												<td>Nama Tim Pelaksana </td>
												<td>: <?=$mandiri['Nama_Tim_Pelaksana'];?></td>
											</tr>
											<tr>
												<td>Nama Lomba</td>
												<td>: <?=$mandiri['Nama_Lomba'];?></td>
											</tr>
											<tr>
												<td>Deskripsi</td>
												<td>: <?=$mandiri['Deskripsi'];?></td>
											</tr>
											<tr>
												<td>Instansi Penyelenggara</td>
												<td>: <?=$mandiri['Instansi_Penyelenggara'];?></td>
											</tr>
											<tr>
												<td>Lokasi Lomba </td>
												<td>: <?=$mandiri['Lokasi_Lomba'];?></td>
											</tr>
											<tr>
												<td>Url Penyelenggara</td>
												<td>: <a href="<?=$mandiri['Url_Penyelenggara'];?>"> <?=$mandiri['Url_Penyelenggara'];?></a></td>
											</tr>
											<tr>
												<td>Kategori Kegiatan</td>
												<td>: <?=$mandiri['Kategori_Kegiatan'];?></td>
											</tr>

											<tr>
												<td>Tanggal Mulai </td>
												<td>:  <?php if($mandiri['Tanggal_Mulai']!=null){echo date_format( date_create($mandiri['Tanggal_Mulai']) ,"d F Y");}  ?> </td>
											</tr>
											<tr>
												<td>Tanggal Selesai</td>
												<td>:  <?php if($mandiri['Tahun_Perolehan_Prestasi']!=null){echo date_format( date_create($mandiri['Tahun_Perolehan_Prestasi']) ,"d F Y");}  ?> </td>
											</tr>
											<tr>
												<td>Tahun Perolehan Prestasi</td>
												<td>: <?=$mandiri['Tahun_Perolehan_Prestasi'];?></td>
											</tr>

											<tr>
												<td>Sertifikat</td>
												<td>: <?php if($mandiri['Upload_Sertifikat']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_4/'.$mandiri['Upload_Sertifikat']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
													<?php } ?></td>
												</tr>

												<tr>
													<td>Bukti Delegasi</td>
													<td>: <?php if($mandiri['Upload_Bukti_Delegasi']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_4/'.$mandiri['Upload_Bukti_Delegasi']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
														<?php } ?></td>
													</tr>

													<tr>
														<td>Foto Penyerahan Prestasi</td>
														<td>: <?php if($mandiri['Foto_Penyerahan_Prestasi']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_4/'.$mandiri['Foto_Penyerahan_Prestasi']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
															<?php } ?></td>
														</tr>

														<tr>
															<td>Foto Kegiatan</td>
															<td>: <?php if($mandiri['Foto_Kegiatan']==""){echo '<i>Tidak Ada File</i>';}else{?><button onclick='open("<?php echo site_url('Welcome/embed_4/'.$mandiri['Foto_Kegiatan']);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open"> File</i></button>
																<?php } ?></td>
															</tr>

														</table>

													</div>


													<div class="col-sm">

														<?php 
														$owner=$mandiri['Owner'];
														$student_id=$this->session->userdata('STUDENTID'); 

														if ($owner==$student_id) {
															?>
															<a href="<?php echo base_url();?>Transaksi/input_anggota_mandiri_1/<?=encrypt_url($mandiri['Prestasi_Mandiri_Id']);?>" class="btn btn-primary btn-sm bt-add bg-umy" style="float: right;" >Tambah Angota</a>

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

																<?php 
																if ($owner==$student_id) {
																	$display='style=" display: block;"';
																	?>
																	<a href="<?php echo site_url('Transaksi/edit_anggota_mandiri/'.encrypt_url($row->Nim).'/'.encrypt_url($row->Prestasi_Mandiri_Id)); ?>" class="btn btn-success btn-sm btn-rounded btn-edit" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Ubah</i></a>

																	<a href="<?php echo site_url('Transaksi/hapus_anggota_mandiri/'.encrypt_url($row->Prestasi_Mandiri_Member).'/'.encrypt_url($row->Prestasi_Mandiri_Id)); ?>" class="btn btn-success btn-sm btn-rounded btn-delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini');" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Hapus</i></a>

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
