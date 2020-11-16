
<!--Main layout-->
<main>
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
        <div class="card-header bg-header-beranda" role="tab" id="headingOne"  >

          <!--Options-->
          <div class="dropdown float-left">
            <button class="btn green btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <div class="dropdown-menu dropdown-info">
            <a class="dropdown-item" href="<?php echo site_url('Login/logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar');">Logout</a>
          </div>
        </div>

        <!-- Heading -->
        <a id="folder-1" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <h5 class="mt-1 mb-0" >
          <span class="label-header-beranda">Data Pribadi</span>
          <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>

    </div>

    <!-- Card body -->
    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-body">






        <!--Grid column-->
        <div class="col-lg-12 col-md-12">
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

                $nim = $mahasiswa['STUDENTID'];
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
                    <td>: <?=$mahasiswa['FULLNAME'];?></td>
                  </tr>
                  <tr>
                    <td>Fakultas</td>
                    <td>: <?=$mahasiswa['NAME_OF_FACULTY'];?></td>
                  </tr>
                  <tr>
                    <td>Prodi</td>
                    <td>: <?=$mahasiswa['NAME_OF_DEPARTMENT'];?></td>
                  </tr>
                </table>
              </div>

            </div>
            <!-- Grid row -->




          </div>
        </div>
        <!--/.Card-->
      </div>
      <!--Grid column-->


    </div>
  </div>
</div>
<!-- Accordion card -->
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->


<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header bg-header-beranda" role="tab" id="headingTwo">

    <!--Options-->
    <div class="dropdown float-left">
      <button class="btn green btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-pencil-alt"></i>
    </button>
    <div class="dropdown-menu dropdown-info">
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/rekognisi'); ?>">Halaman Bidang</a>
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/input_rekognisi'); ?>">Tambah</a>
    </div>
  </div>

  <!-- Heading -->
  <a id="folder-2" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo"
  aria-expanded="true" aria-controls="collapseTwo">
  <h5 class="mt-1 mb-0">
    <span  class="label-header-beranda">Bidang Rekognisi (Prestasi Non-Lomba & Non-Kejuaraan)</span>
    <i class="fas fa-angle-down rotate-icon"></i>
  </h5>
</a>

</div>

<!-- Card body -->
<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
  <div class="card-body">


    <!--Grid column-->
    <div class="col-lg-12 col-md-12">



      <?php if ($rekognisi!=null) {
        ?>

        <?php $no=0; foreach($rekognisi as $row): $no++; ?>

        <!--Card-->
        <div class="card">
          <!--Card content-->
          <div class="card-body">
            <table width="100%" border="0" >
              <tr>
                <td width="10%" ><?php echo $no; ?></td>
                <td width="80%" ><?php echo $row->Jenis_Rekognisi; ?><br>
                  <b>Nama Karya </b>: <?php echo $row->Nama_Karya; ?><br>
                  <b>Tahun </b>: <?php echo $row->Tahun_Pengajuan; ?>
                </td>
                <td width="10%" > <a href="<?php echo site_url('Transaksi/lihat_rekognisi/'.encrypt_url($row->Bidang_Rekognisi_Id)); ?>" class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Lihat</i></a></td>
              </tr>
            </table>
          </div>
        </div>
        <!--/.Card-->

      <?php endforeach; ?>


      <?php
    }else{
     ?>
     <p><center>Belum Ada Data Bidang Rekognisi</center></p>
     <?php
   } ?>

   

 </div>
 <!--Grid column-->

</div>
</div>
</div>
<!-- Accordion card -->
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header bg-header-beranda" role="tab" id="headingThree">

    <!--Options-->
    <div class="dropdown float-left">
      <button class="btn green btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-pencil-alt"></i>
    </button>
    <div class="dropdown-menu dropdown-info">
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/wirausaha'); ?>">Halaman Bidang</a>
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/input_wirausaha'); ?>">Tambah</a>
    </div>
  </div>

  <!-- Heading -->
  <a id="folder-3" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree"
  aria-expanded="true" aria-controls="collapseThree">
  <h5 class="mt-1 mb-0">
    <span class="label-header-beranda">Kelompok Wirausaha</span>
    <i class="fas fa-angle-down rotate-icon"></i>
  </h5>
</a>
</div>

<!-- Card body -->
<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
  <div class="card-body">

    <!--Grid column-->
    <div class="col-lg-12 col-md-12">


      <?php if ($wirausaha!=null) {
        ?>

        <?php $no1=0; foreach($wirausaha as $row): $no1++; ?>

        <!--Card-->
        <div class="card">
          <!--Card content-->
          <div class="card-body">
            <table width="100%" border="0" >
              <tr>
                <td width="10%" ><?php echo $no1; ?></td>
                <td width="80%" ><?php echo $row->Nama_Usaha; ?><br>
                  <b>Deskripsi Usaha </b>: <?php echo $row->Deskripsi_Usaha; ?><br>
                  <b>Tahun Pendirian Usaha </b>: <?php echo $row->Tahun_Pendirian_Usaha; ?>
                </td>
                <td width="10%" > <a href="<?php echo site_url('Transaksi/lihat_wirausaha/'.encrypt_url($row->Kelompok_Wirausaha_Id)); ?>" class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Lihat</i></a></td>
              </tr>
            </table>
          </div>
        </div>
        <!--/.Card-->

      <?php endforeach; ?>

      <?php
    }else{
     ?>
     <p><center>Belum Ada Data Kelompok Wirausaha</center></p>
     <?php
   } ?>

   
 </div>
 <!--Grid column-->

</div>
</div>
</div>
<!-- Accordion card -->
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header bg-header-beranda" role="tab" id="headingFourt">

    <!--Options-->
    <div class="dropdown float-left">
      <button class="btn green btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-pencil-alt"></i>
    </button>
    <div class="dropdown-menu dropdown-info">
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/pengabdian'); ?>">Halaman Bidang</a>
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/input_pengabdian'); ?>">Tambah</a>
    </div>
  </div>

  <!-- Heading -->
  <a id="folder-3" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFourt"
  aria-expanded="true" aria-controls="collapseFourt">
  <h5 class="mt-1 mb-0">
    <span class="label-header-beranda">Bidang Pengabdian Masyarakat</span>
    <i class="fas fa-angle-down rotate-icon"></i>
  </h5>
</a>
</div>

<!-- Card body -->
<div id="collapseFourt" class="collapse" role="tabpanel" aria-labelledby="headingFourt">
  <div class="card-body">
    <!--Grid column-->
    <div class="col-lg-12 col-md-12">


      <?php if ($pengabdian!=null) {
        ?>

        <?php $no1=0; foreach($pengabdian as $row): $no1++; ?>

        <!--Card-->
        <div class="card">
          <!--Card content-->
          <div class="card-body">
            <table width="100%" border="0" >
              <tr>
                <td width="10%" ><?php echo $no1; ?></td>
                <td width="80%" ><?php echo $row->Judul_Pengabdian; ?><br>
                  <b>Kelompok Sasaran </b>: <?php echo $row->Kelompok_Sasaran; ?><br>
                  <b>Organisasi Pelaksana </b>: <?php echo $row->Nama_Organisasi_Pelaksana; ?>
                </td>
                <td width="10%" > <a href="<?php echo site_url('Transaksi/lihat_pengabdian/'.encrypt_url($row->Pengabdian_Id)); ?>" class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Lihat</i></a></td>
              </tr>
            </table>
          </div>
        </div>
        <!--/.Card-->

      <?php endforeach; ?>

      <?php
    }else{
     ?>
     <p><center>Belum Ada Data Pengabdian Masyarakat</center></p>
     <?php
   } ?>

   
 </div>
 <!--Grid column-->
</div>
</div>
</div>
<!-- Accordion card -->
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header bg-header-beranda" role="tab" id="headingFive">

    <!--Options-->
    <div class="dropdown float-left">
      <button class="btn green btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-pencil-alt"></i>
    </button>
    <div class="dropdown-menu dropdown-info">
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/exchange'); ?>">Halaman Bidang</a>
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/input_exchange'); ?>">Tambah</a>
    </div>
  </div>

  <!-- Heading -->
  <a id="folder-3" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFive"
  aria-expanded="true" aria-controls="collapseFive">
  <h5 class="mt-1 mb-0">
    <span class="label-header-beranda">Bidang Student Exchange</span>
    <i class="fas fa-angle-down rotate-icon"></i>
  </h5>
</a>
</div>

<!-- Card body -->
<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
  <div class="card-body">
    <?php if ($exchange!=null) {
      ?>

      <?php $no1=0; foreach($exchange as $row): $no1++; ?>

      <!--Card-->
      <div class="card">
        <!--Card content-->
        <div class="card-body">
          <table width="100%" border="0" >
            <tr>
              <td width="10%" ><?php echo $no1; ?></td>
              <td width="80%" ><?php echo $row->Nim; ?><br>
                <b>Nama Program Kegiatan </b>: <?php echo $row->Nama_Program_Kegiatan; ?><br>
                <b>Tahun Pelaksanaan </b>: <?php echo $row->Tahun_Pelaksanaan; ?>
              </td>
              <td width="10%" > <a href="<?php echo site_url('Transaksi/lihat_exchange/'.encrypt_url($row->Student_Exchange_Id)); ?>" class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Lihat</i></a></td>
            </tr>
          </table>
        </div>
      </div>
      <!--/.Card-->

    <?php endforeach; ?>

    <?php
  }else{
   ?>
   <p><center>Belum Ada Data Student Exchange</center></p>
   <?php
 } ?>
</div>
</div>
</div>
<!-- Accordion card -->
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->


<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header bg-header-beranda" role="tab" id="headingSix">

    <!--Options-->
    <div class="dropdown float-left">
      <button class="btn green btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-pencil-alt"></i>
    </button>
    <div class="dropdown-menu dropdown-info">
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/mandiri'); ?>">Halaman Bidang</a>
      <a class="dropdown-item" href="<?php echo base_url('Transaksi/input_mandiri'); ?>">Tambah</a>
    </div>
  </div>

  <!-- Heading -->
  <a id="folder-3" data-toggle="collapse" data-parent="#accordionEx" href="#collapseSix"
  aria-expanded="true" aria-controls="collapseSix">
  <h5 class="mt-1 mb-0">
    <span class="label-header-beranda">Bidang Prestasi Mandiri</span>
    <i class="fas fa-angle-down rotate-icon"></i>
  </h5>
</a>
</div>

<!-- Card body -->
<div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
  <div class="card-body">
    <?php if ($mandiri!=null) {
      ?>

      <?php $no1=0; foreach($mandiri as $row): $no1++; ?>

      <!--Card-->
      <div class="card">
        <!--Card content-->
        <div class="card-body">
          <table width="100%" border="0" >
            <tr>
              <td width="10%" ><?php echo $no1; ?></td>
              <td width="80%" ><?php echo $row->Nama_Lomba; ?><br>
                <b>Capaian Prestasi </b>: <?php echo $row->Capaian_Prestasi; ?><br>
                <b>Tahun Perolehan Prestasi </b>: <?php echo $row->Tahun_Perolehan_Prestasi; ?>
              </td>
              <td width="10%" > <a href="<?php echo site_url('Transaksi/lihat_mandiri/'.encrypt_url($row->Prestasi_Mandiri_Id)); ?>" class="btn btn-success btn-sm btn-rounded bg-umy" data-popup="tooltip" data-original-title="Lihat File" data-placement="top"><i class="fa fa-folder-open">Lihat</i></a></td>
            </tr>
          </table>
        </div>
      </div>
      <!--/.Card-->

    <?php endforeach; ?>

    <?php
  }else{
   ?>
   <p><center>Belum Ada Data Prestasi Mandiri</center></p>
   <?php
 } ?>
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

