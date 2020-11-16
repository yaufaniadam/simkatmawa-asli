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
							<span >Bidang Rekognisi (Prestasi Non-Lomba & Non-Kejuaraan)</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>

					</div>

					<!-- Card body -->
					<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
						<div class="card-body">

							<a href="<?php echo base_url();?>Transaksi/input_rekognisi/" class="btn btn-primary btn-sm bt-add bg-umy" style="float: right;" >Tambah</a>

						</br></br>

						<div style="width: 100%; overflow: scroll;">

							<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead class="text-tabel header_tabel">
									<tr>
									</th>
									<th class="th-sm"><center>Informasi Karya</center>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach($all as $row): $no++; ?>
								<tr>
									<td>
										<b>No</b>: <?php echo $no; ?><br>
										<b>Jenis Rekognisi</b>: <?php echo $row->Jenis_Rekognisi; ?><br>
										<b>Nama Karya </b>: <?php echo $row->Nama_Karya; ?><br>
										<b>Tahun </b>: <?php echo $row->Tahun_Pengajuan; ?><br>
										<b>No Registrasi </b>: <?php echo $row->Nomor_Registrasi; ?><br>
										<b>No Pencatatan Hak Cipta </b>: <?php echo $row->Nomor_Pencatatan_Hak_Cipta; ?><br>

										<a href="<?php echo site_url('Transaksi/lihat_rekognisi/'.encrypt_url($row->Bidang_Rekognisi_Id)); ?>" class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Lihat</i></a>

										<a href="<?php echo site_url('Transaksi/ubah_rekognisi/'.encrypt_url($row->Bidang_Rekognisi_Id)); ?>" class="btn btn-success btn-sm btn-rounded btn-edit" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Ubah</i></a>

										<a href="<?php echo site_url('Transaksi/hapus_rekognisi/'.encrypt_url($row->Bidang_Rekognisi_Id)); ?>" class="btn btn-success btn-sm btn-rounded btn-delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini');" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Hapus</i></a>

									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>

							</tr>
						</tfoot>
					</table>

				</div>






			</div>
		</div>
		<!-- Accordion card -->
		<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

	</div>
</div>
<!--/.Accordion wrapper-->

</section>
<!--Section: Accordion-->

</div>
</main>
<!--Main layout