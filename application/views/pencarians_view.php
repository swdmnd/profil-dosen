<!DOCTYPE html>
<html>
    <head>
      <title>Direktori Dosen Fakultas Teknik</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Direktori Dosen Fakultas Teknik" />
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
      <!-- css files -->
      <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url('assets/css/chromagallery.css')?>" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>" rel="stylesheet">
      <!-- /css files -->
      <!-- fonts -->
      <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
      <!-- /fonts -->
      <!-- js files -->
      <script src="<?php echo base_url('assets/js/modernizr.custom.js')?>"></script>
      <!-- /js files -->
      </head>
      <body id="index.html" data-spy="scroll" data-target=".navbar" data-offset="60">
      <!-- Top Bar -->
      <section class="top-bar">
      	<div class="container">
      		<div class="row">
      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <img src="<?php echo base_url('assets/img/logo-teknik.png')?>"/>
      			</div>
      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      				<ul class="social-icons1">
      					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
      					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
      					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="<?php echo site_url('login/index')?>" class="btn btn-success" role="button">Login</a></li>

      				</ul>
      			</div>
      		</div>
      	</div>
      </section>
      <!-- /Top Bar -->
      <!-- Navigation Bar -->

      <!-- /Navigation Bar -->
      <!-- Banner Section -->
       <!-- Carousel
          ================================================== -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      	<!-- Indicators -->
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
              <div class="item active">
      			<img class="first-slide" src="<?php echo base_url('assets/img/banner1.jpg')?>" alt="First slide">
      			<div class="container">
      				<div class="carousel-caption">

      				</div>
      			</div>
              </div>
              <div class="item">
      			<img class="second-slide" src="<?php echo base_url('assets/img/banner2.jpg')?>" alt="Second slide">
      			<div class="container">
      				<div class="carousel-caption">

      				</div>
      			</div>
              </div>
      			</div>
              </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>

      <!-- CSS
      ================================================== -->
      <!-- Fontawesome Icon font -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/brandi/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/brandi/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/brandi/css/jquery.fancybox.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/brandi/css/animate.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/brandi/css/main.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/brandi/css/media-queries.css">


      <section id="team" class="team">
        <div class="container">
          <div class="row">

            <div class="sec-title text-center wow fadeInUp animated" data-wow-duration="700ms">
              <h2>Direktori Dosen Fakultas Teknik</h2>
            </div>

            <div class="sec-sub-title text-center wow fadeInRight animated" data-wow-duration="500ms">
              <p>Selamat datang di situs Direktori Dosen Fakultas Teknik</p>
            </div>

            <!-- single member -->
            <?php for ($i = 0; $i < count($users); ++$i) { ?>
            <figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
              <div class="member-thumb">
                <img src="<?= base_url(); ?><?= $users[$i]->foto ?>" alt="Team Member" class="img-responsive">
                <figcaption class="overlay">
                  <b><p style="color:black"><?= $users[$i]->deskripsi_singkat ?></p></b>
                  <ul class="social-links text-center">
                    <li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
                  </ul>
                </figcaption>
              </div>
              <h4><a style="color:black" href="<?=base_url();?>index.php/detail/index/<?= $users[$i]->uid?>" ><?= $users[$i]->nama_lengkap ?></a></h4>
              <span><h4><?= $users[$i]->prodi ?></h4></span><br/>
              <span><h4><?= $users[$i]->research_interests ?></h4></span>
            </figure>
            <?php } ?>
            <!-- end single member -->

          </div>
        </div>
      </section>
      <div class="row">
      <div class="col-md-12 text-center">
          <?php echo $pagination; ?>
      </div>
      </div>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
<body>
    <div class="container">
        <center><h1 style="font-size:20pt;color:black">Pencarian Dosen</h1></center>

        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="color:black" >Filter Dosen : </h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                        <label for="prodi" class="col-sm-2 control-label" style="color:black">Program Studi</label>
                        <div class="col-sm-4">
                            <?php echo $form_prodi; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label" style="color:black">Nama Dosen</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_lengkap">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="research_interests" class="col-sm-2 control-label" style="color:black">Minat Penelitian</label>
                        <div class="col-sm-4">
                            <input type="text" style="color:black" class="form-control" id="research_interests">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="color:black">No</th>
                    <th style="color:black">Nama</th>
                    <th style="color:black">Program Studi</th>
                    <th style="color:black">Minat Penelitian</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th style="color:black">No</th>
                    <th style="color:black">Nama</th>
                    <th style="color:black">Prodi</th>
                    <th style="color:black">Minat Penelitian</th>
                </tr>
            </tfoot>
        </table>
    </div>

<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pencarian/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nama_lengkap = $('#nama_lengkap').val();
                data.prodi = $('#prodi').val();
                data.research_interests = $('#research_interests').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });

});

</script>

</body>
</html>
