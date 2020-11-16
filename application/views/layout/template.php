<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SIMKATMAWA || <?php echo $title; ?></title>
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


  <!-- MDBootstrap Datatables  -->
  <link href="<?php echo base_url('assets/addons/datatables.min.css'); ?>" rel="stylesheet">


  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/upload/css/normalize.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/upload/css/demo.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/upload/css/component.css'); ?>" />

   <!-- datetimepicker-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datetimepicker/jquery.datetimepicker.css"/>
  <!-- <script src="<?php echo base_url();?>assets/datetimepicker/jquery.js"></script> -->
  <script src="<?php echo base_url();?>assets/datetimepicker/build/jquery.datetimepicker.full.js"></script>

  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

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

.header-card{
  background-color: #004028!important;
  color: #FFFFFF!important;
  font-size: 26px;
  font-weight: bold;
}

.bg-umy{
  background-color: #004028!important;
}

.text_bio{
  color: #004028!important;
}
.header_tabel{
  background-color: #004028!important;
  color: #FFFFFF!important;
  font-weight: bold;
}
.btn-edit{
  background-color:#FFD700!important;
}
.btn-delete{
  background-color:#B22222!important;
}
</style>
</head>
<body class="fixed-sn">

  <?php include $header; ?>

  <?php include $content; ?>

  <?php include $footer; ?>


  <!-- jQuery -->
  <!-- <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script> -->
  <!-- Bootstrap tooltips -->
  <!-- <script type="text/javascript" src="<?=base_url();?>assets/js/popper.min.js"></script> -->
  <!-- Bootstrap core JavaScript -->
  <!-- <script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script> -->
  <!-- MDB core JavaScript -->
  <!-- <script type="text/javascript" src="<?=base_url();?>assets/js/mdb.min.js"></script> -->
  <!-- Your custom scripts (optional) -->
  <!-- <script type="text/javascript"></script> -->



  <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/mdb.min.js'); ?>"></script>

  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/addons/datatables.min.js'); ?>"></script>

  <!-- datepicker-->
  <script src="<?php echo base_url('assets/pickadate/lib/picker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/pickadate/lib/picker.date.js'); ?>"></script>
  <script src="<?php echo base_url('assets/pickadate/lib/legacy.js'); ?>"></script>

  <script src="<?php echo base_url('assets/upload/js/custom-file-input.js'); ?>"></script>

  <script type="text/javascript">

    var a = jQuery.noConflict();
    a(document).ready(function () {
      a('#dtBasicExample').DataTable();
      a('.dataTables_length').addClass('bs-select');
    });

    var b = jQuery.noConflict();
    b(document).ready(function () {
      b('#dtBasicExample1').DataTable();
      b('.dataTables_length').addClass('bs-select');
    });

    var c = jQuery.noConflict();
    c(document).ready(function () {
      c('#dtBasicExample2').DataTable();
      c('.dataTables_length').addClass('bs-select');
    });

    $(document).ready(function() {
     $('.mdb-select').materialSelect();
   });


 </script>

</body>
</html>
