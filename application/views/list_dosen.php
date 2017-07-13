		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

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
					<?php foreach ($users as $item):?>
					<figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
						<div class="member-thumb">
							<img src="<?= base_url(); ?><?= $item['foto']?>" alt="Team Member" class="img-responsive">
							<figcaption class="overlay">
								<p><?= $item['deskripsi_singkat'] ?></p>
								<ul class="social-links text-center">
									<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
									<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
								</ul>
							</figcaption>
						</div>
						<h4><a style="color:black" href="<?=base_url();?>index.php/detail/index/<?= $item['uid']?>" ><?= $item['nama_lengkap'] ?></a></h4>
						<span><h4><?= $item['prodi'] ?></h4></span><br/>
						<span><h4><?= $item['research_interests'] ?></h4></span>
					</figure>
					<?php endforeach; ?>
					<!-- end single member -->
					
				</div>
			</div>
		</section>