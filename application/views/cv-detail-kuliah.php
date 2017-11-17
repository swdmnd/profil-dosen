

<div class="main-header">

  <!--Block content-->



  <!--Row-->
  <div class="row">
    <div class="col-md-9">
			<div class=" profile margBSmall">

					<h1 style="font-size:18px;text-transform:capitalize">Deskripsi Mata Kuliah <?= $kuliah_item->nama_mk?></h1>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        Mata Kuliah <?= $kuliah_item->nama_mk ?> ini terdiri dari <?= $kuliah_item->sks_mk?> SKS. Kode Mata Kuliah ini adalah <?= $kuliah_item->kode_mk?>. <?= $kuliah_item->deskripsi_mk?> </p>
        <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        Pengampu Mata Kuliah ini adalah :
      </p>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
      <?= nl2br($kuliah_item->pengampu_mk) ?></p>
        <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        Dokumen Perkuliahan bisa diunduh di bawah ini:
      </p>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        <?php
        if ($kuliah_item->rps_mk)
        {
        $link_rps = str_replace('\\', '/', $kuliah_item->rps_mk);
        $encoded = base64_encode($link_rps);
        echo "<a href='". base_url ()."index.php/getfiles/download/".$encoded."'>RPS</a>\n";
        }
        else {
          echo "RPS masih belum diunggah";
        }
        ?>
      </p>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        <?php
        if ($kuliah_item->kontrak_mk)
        {
        $link_kontrak = str_replace('\\', '/', $kuliah_item->kontrak_mk);
        $encoded = base64_encode($link_kontrak);
        echo "<a href='". base_url ()."index.php/getfiles/download/".$encoded."'>Kontrak Kuliah</a>\n";
        }
        else {
          echo "Kontrak kuliah masih belum diunggah";
        }
        ?>
      </p>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        <?php
        if ($kuliah_item->silabus_mk)
        {
        $link_silabus = str_replace('\\', '/', $kuliah_item->silabus_mk);
        $encoded = base64_encode($link_silabus);
        echo "<a href='". base_url ()."index.php/getfiles/download/".$encoded."'>Silabus</a>\n";
        }
        else {
          echo "Silabus masih belum diunggah";
        }
        ?>
      </p>
      <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
        <?php if ($kuliah_item->link_kulon){?>
      <a href="<?= $kuliah_item->link_kulon?>">Link ke kulon bisa diakses di sini</a>
    <?php } ?>
        </p>
        <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
          <?php if ($kuliah_item->link_drive){?>
        <a href="<?= $kuliah_item->link_drive?>">Link ke penyimpanan luar bisa diakses di sini</a>
      <?php } ?>
          </p>
          <p style="color:#515151;text-align:justify;font-family:candara, sans-serif">
          Tugas yang bisa dilihat dari mata kuliah ini:<br>
          <?php

          function recursive($arr,$level=0) {
              foreach ($arr as $dtree) {

                if ($dtree['kind']=='directory')
                {

                  echo "<span style='text-transform:capitalize;argin-left:".$level*10 ."px'>".$dtree['name']."</span><br>";

                  echo "<ul>\n";
                  if (count($dtree['content'])>0)
                  {
                  recursive($dtree['content'],$level+1);
                  }

                  echo "</ul>\n";
                }
                elseif ($dtree['kind']=='file')
                {
                  $encoded = base64_encode($dtree['path']);
                  echo "<span style='text-transform:capitalize;margin-left:".$level*10 ."px'><a href='". base_url ()."index.php/getfiles/download/".$encoded."'>".$dtree['name']."</a></span><br>";
                }

              }
          }
          if($directory_tree!=false)
          {
          recursive($directory_tree);
          }
          ?>
        </p>
    </div>
</div>
							<div class="col-md-3">
                <ul>
                  <li><a href="#" style="margin-bottom:5px;text-align:left;color: #ffffff;background-color: #336699;padding: 4px 5px;display:block"><b>Kuliah</b></a></li>

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

</div>
