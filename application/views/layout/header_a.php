 <!--Main Navigation-->
 <header>
  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color bg-umy">
    <a class="navbar-brand" href="<?php echo site_url('Beranda'); ?>">SIMKATMAWA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Beranda'); ?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Bidang
      </a>
      <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
        <a class="dropdown-item" href="<?php echo base_url('Transaksi/rekognisi'); ?>">Rekognisi (Prestasi Non-Lomba & Non-Kejuaraan)</a>
        <a class="dropdown-item" href="<?php echo base_url('Transaksi/wirausaha'); ?>">Kelompok Wirausaha</a>
        <a class="dropdown-item" href="<?php echo base_url('Transaksi/pengabdian'); ?>">Pengabdian Masyarakat</a>
        <a class="dropdown-item" href="<?php echo base_url('Transaksi/exchange'); ?>">Student Exchange</a>
        <a class="dropdown-item" href="<?php echo base_url('Transaksi/mandiri'); ?>">Prestasi Mandiri</a>
      </div>
    </li>

  </ul>
  <ul class="navbar-nav ml-auto nav-flex-icons">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama'); ?>
    </a>
      <!-- <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i>
      <span class="clearfix d-none d-sm-inline-block"><?php echo $this->session->userdata('nama'); ?></span> -->
    </a>

    <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
      <a class="dropdown-item" href="<?php echo site_url('Login/logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar');">Logout</a>
    </div>
      <!-- <div class="dropdown-menu dropdown-menu-right dropdown-default"
      aria-labelledby="navbarDropdownMenuLink-333">
      <a class="dropdown-item" href="<?php echo site_url('Login/logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar');">Logout</a>
    </div> -->
  </li>
</ul>
</div>
</nav>
<!--/.Navbar -->

</header>
        <!--Main Navigation-->