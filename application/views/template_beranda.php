<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Direktori Dosen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/select2.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
    
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/skins/skin-purple-light.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/skins/skin-magenta.min.css">
  
  <style>
    .nav-btn-custom{
      background-color:#EC005F;
      border: none;
      color: white;
    }
    .nav-btn-custom:hover{
      background-color:#E2005B;
      border: none;
      color: white;
    }
    .select-custom{
      color: white;
    }
    .select-custom:focus{
      color: black;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    
  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 2.2.3 -->
  <script src="<?= base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?= base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/mask/jquery.mask.min.js"></script>
  <!-- DataTable -->
  <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/highlight/jquery.highlight.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>assets/js/app.js"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-magenta layout-top-nav fixed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><img class="img-responsive pull-left" style="height:48px; width:auto; position:relative; top:-11px;" src="<?=base_url()?>/assets/img/logo.png" />
        &nbsp;Universitas Diponegoro</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
<!--
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
-->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=site_url()?>/login">Login</a></li>
          </ul>
          <form class="navbar-form navbar-right form-inline" method="get" role="search">
            <div class="form-group">
                <input type="text" name="q" class="form-control select-custom" id="navbar-search-input" placeholder="Search" value="<?= $this->input->get("q") ?>">
            </div>
            <div class="form-group">
                <div class="input-group">
                  <select class="form-control select-custom cat" id="navbar-search-input" name="cat" placeholder="Search">
                    <optgroup label="Dosen">
                      <option value="dosen_nama">Dosen - Nama</option>
                      <option value="dosen_nik">Dosen - NIK</option>
                    </optgroup>
                    <optgroup label="Penelitian">
                      <option value="penelitian_judul">Penelitian - Judul</option>
                      <option value="penelitian_tahun">Penelitian - Tahun</option>
                      <option value="penelitian_tag">Penelitian - tag</option>
                    </optgroup>
                    <optgroup label="Pengabdian">
                      <option value="pengabdian_judul">Pengabdian - Judul</option>
                      <option value="pengabdian_tahun">Pengabdian - Tahun</option>
                      <option value="pengabdian_tag">Pengabdian - Tag</option>
                    </optgroup>
                    <optgroup label="Publikasi">
                      <option value="publikasi_judul">Publikasi - Judul jurnal</option>
                      <option value="publikasi_tahun">Publikasi - Tahun</option>
                      <option value="publikasi_nomor">Publikasi - Nomor Jurnal</option>
                      <option value="publikasi_tag">Publikasi - Tag</option>
                    </optgroup>
                    
                  </select>
                  <span class="input-group-btn">
                    <button class="btn btn-default nav-btn-custom" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </span>
                </div>
            </div>
          </form>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <img class="img-responsive" style="height:auto; width:100%;" src="<?=base_url()?>/assets/img/banner.jpg" />
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <?php $this->load->view($content); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Fakultas Psikologi
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="<?= site_url() ?>/home">Sistem Informasi Dosen Universitas Diponegoro</a>.</strong> All rights reserved (仮).
  </footer>
</div>
<!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
  <script>
    if('<?= $this->input->get('cat') ?>' != '') $('.cat').val('<?= $this->input->get('cat') ?>');
  </script>
</body>
</html>
