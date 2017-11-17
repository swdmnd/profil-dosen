

<div class="main-header">


          <div class="row">

            <div class="col-md-9">
              <div class=" profile margBSmall">
              <h1 style="font-size:18px;text-transform:capitalize;margin-bottom:-10px">Penelitian</h1>
              </div>
                <?php
                    if(empty($penelitian)) echo '<h4>-</h4>';
                    $a = 0;

                    foreach($penelitian as $item):

                      if ($a != $item->tahun_mulai) {
                        if ($a!=0)
                        { ?>

                      <?php }
                        $a = $item->tahun_mulai;

                ?>
                <div class="hgroup" >
                  <h4 style="color:#515151;font-size:18px;text-align:justify;font-family:candara, sans-serif;line-height: 80%;text-transform:capitalize;"><?= $item->tahun_mulai?></h4>
                </div>
                <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><li><?= $item->judul ?>.
                Sumber Dana : <?= $item->sumber_dana ?>.</h4></li>
              <?php } else { ?>
              <?php
                $a = $item->tahun_mulai; ?>
                <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><li><?= $item->judul ?>.
                Sumber Dana : <?= $item->sumber_dana ?>.</h4></li>
            <?php
          }
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
