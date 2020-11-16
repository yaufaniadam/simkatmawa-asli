<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SIMKATMAWA || Login</title>
  <!-- MDB icon -->
  <link rel="icon" href="<?=base_url();?>assets/img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
  <!-- Google Fonts Roboto -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> -->
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

  <style type="text/css">
   .side-nav .logo-sn {
    padding-bottom: 1rem;
    padding-top: 1rem;
  }

  .side-nav .logo-sn img {
    height: 38px;
  }

  .side-nav .search-form input[type=text] {
    margin-top: 0;
    padding-top: 12px;
    padding-bottom: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
  }

  body {
    background-color: #eee;
  }

  .accordion .card {
    margin-bottom: 1.2rem;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  }

  .accordion .card .card-body {
    border-top: 1px solid #eee;
  }

  .bg-header-beranda{
    background-color: #004028!important;
    font-size: 26px;
    text-align: center;
    font-weight: bold;
  }

  .bg-radius{
   border-radius: 20px;
 }

 .label-header-beranda{
  color: #FFFFFF!important;
}

.bg-dropdown{
  background-color: #004028!important;
}

.bg-header{
  background-color: #FFFFFF!important;
}

.logout-header{
  color: #004028!important;
}

.bg-umy{
  background-color: #004028!important;
}

.text_bio{
  color: #004028!important;
}
</style>
</head>
<body class="fixed-sn">



  <!-- Start your project here-->  
  <div style="height: 100vh">
    <div class="flex-center flex-column">


      <!-- Material form subscription -->
      <div class="card">

        <h5 class="card-header info-color white-text text-center py-4 bg-umy">
          <strong>Login Mahasiswa</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5">

          <!-- Form -->
          <form class="text-center" style="color: #757575;" action="<?php echo site_url('Login/signin'); ?>" method="post">


              <p>Login dengan menggunakan E-mail UMY dan Password.</p>

              <!--alert-->
              <?php
              $data=$this->session->flashdata('success');
              if($data!=""){ ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?=$data;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php } ?>
              <?php
              $data2=$this->session->flashdata('error');
              if($data2!=""){ ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?=$data2;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php } ?>
              <!--alert-->


              <!-- E-mai -->
              <div class="md-form mt-3">
                <input type="email" id="materialSubscriptionFormEmail" name="username" class="form-control" required>
                <label for="materialSubscriptionFormEmail">E-mail</label>
              </div>

              <!-- Password -->
              <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" name="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                <label for="materialRegisterFormPassword">Password</label>
              </div>

              <!-- Sign in button -->
              <button class="btn btn-outline-success btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Login</button>

            </form>
            <!-- Form -->

          </div>

        </div>
        <!-- Material form subscription -->




      </div>
    </div>
    <!-- End your project here-->


    <!-- jQuery -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

  </body>
  </html>
