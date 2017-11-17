
<div class="main-header">


          <div class="row">

            <div class="col-md-9">
              <div class=" profile margBSmall">

              <h1 style="font-size:18px;text-transform:capitalize;margin-bottom:-10px">Riwayat Pendidikan</h1>
</div>
                <?php
                    $i=0;
                    if(empty($pendidikan)) echo '<h4>-</h4>';
                    foreach($pendidikan as $item):
                ?>
                <div class="hgroup" >
                  <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 80%;text-transform:capitalize;"><li><?= $item->tingkat ?> – <?= $item->bidang_ilmu ?> – <?= $item->nama_pt ?> (<?= $item->tahun_masuk?></span> - <span class="current"><?= $item->tahun_lulus ?>)</h4></li>

                </div>
                <!--
                <?php if ($item->tingkat=='D3'||$item->tingkat=='S1') {?>
                <p style="color:black">Judul Tugas Akhir : <?= $item->judul_ta ?><br>
                Pembimbing : <?= $item->pembimbing ?>
                </p>
                <?php } elseif ($item->tingkat=='S2') {?>
                <p style="color:black">Judul Tesis : <?= $item->judul_ta ?><br>
                Pembimbing : <?= $item->pembimbing ?>
                </p>
                <?php } elseif ($item->tingkat=='S3') {?>
                <p style="color:black">Judul Disertasi : <?= $item->judul_ta ?><br>
                Pembimbing : <?= $item->pembimbing ?>
                </p>
                <?php } ?>
                -->
                <?php
                    endforeach;
                ?>

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

        </div>
