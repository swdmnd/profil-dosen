

<div class="main-header">




  <!--Row-->
  <div class="row">
    <div class="col-md-9">
			<div class=" profile margBSmall">

					<h1 style="font-size:18px;text-transform:capitalize">Deskripsi Singkat</h1>

												<h1 style="font-size:18px;text-transform: capitalize;"><?= $identitas->nama_lengkap ?></h1>
		<!--<h1 style="font-size:18px;text-transform: capitalize;color:#7d7d7d">Dosen <?= $identitas->prodi ?> UNDIP</h1>-->
										</div>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">										<img width="150px" style="float:left;margin: 0px 15px 15px 0px;" src="<?= base_url() . $identitas->foto_path.$identitas->foto; ?>">
<?= $identitas->deskripsi_singkat ?></p>
    </div>

							<div class="col-md-3">
                <ul>
                  <li><a href="#" style="text-align:left;color: #ffffff;background-color: #336699;padding: 4px 5px;display:block"><b>Kuliah</b></a></li>

                <?php
                    $i=0;
                    if(empty($kuliah)) echo '<h4>-</h4>';
                    foreach($kuliah as $item):
                ?>
                <li><a href="kuliah-<?= $item->id?>" style="margin:10px;text-align:left;text-decoration:underline;color:blue;line-height:30px;"><?=$item->nama_mk?></a></li>

              <?php endforeach;?>
                <div class="feedgrabbr_widget" id="fgid_6145d901845759ce961ce4e19"></div>
                <script>if (typeof (fg_widgets) === "undefined") fg_widgets = new Array(); fg_widgets.push("fgid_6145d901845759ce961ce4e19");</script>
                <script async src="https://www.feedgrabbr.com/widget/fgwidget.js"></script>
							</div>

  </div>
  <!--End row-->

  </div>
  <!--End block content-->



  <!--Block content-->
  <div class="block-content">

    <div class="info">

      <!--Row-->
			<!--
      <div class="row">
        <div class="col-md-12">

          <ul class="info-list clearfix">
            <li><span class="inf" style="text-align:left;padding-left:20px">Jabatan Fungsional</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->jabatan_fungsional ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Jabatan Struktural</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->jabatan_struktural ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">NIDN</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->nidn ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Tempat Lahir</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->tempat_lahir ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Tanggal Lahir</span>  <span class="value" style="text-align:left;padding-left:20px"><?= date_format(date_create($identitas->tanggal_lahir),"d-m-Y") ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Alamat Rumah</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->alamat_rumah ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Alamat Kantor</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->alamat_kantor ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Nomor Telepon</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->kontak_kantor ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px">Alamat E-mail</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->email ?></span></li>
            <li><span class="inf" style="text-align:left;padding-left:20px"><br><br>Lulusan yang dihasilkan<br><br><br></span>
            <span class="value" style="text-align:left;padding-left:20px">
            <?php
  					$meluluskan = $identitas->meluluskan;
  					if ($meluluskan!='')
  					{
  					preg_match_all("/([^,= ]+):([^,= ]+)/", $meluluskan, $r);
  					$result = array_combine($r[1], $r[2]);
  					?>
                      D3 : <?= $result['D3']?><br>
                      S1 : <?= $result['S1']?><br>
                      Profesi : <?= $result['Pr']?><br>
                      S2 : <?= $result['S2']?><br>
                      S3 : <?= $result['S3']?>
  					<?php
  					}
  					?>
          </span></li>
          <li><span class="inf" style="text-align:left;padding-left:20px">Mata kuliah yang diampu</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->mk_diampu ?></span></li>
          <li><span class="inf" style="text-align:left;padding-left:20px">Research Interests</span>  <span class="value" style="text-align:left;padding-left:20px"><?= $identitas->research_interests ?></span></li>

          </ul>

        </div>

      </div>
		-->
      <!--End row-->
                  </div>
                </div>
  <!--End block content-->
