<div class="main-header">

          <div class="row">

            <div class="col-md-9">
              <div class=" profile margBSmall">
              <h1 style="font-size:18px;text-transform:capitalize;margin-bottom:-10px">Nara Sumber</h1>
              </div>
                <?php
                    if(empty($seminar)) echo '<h4>-</h4>';
                    $a = 0;

                    foreach($seminar as $item):
                      $date = DateTime::createFromFormat("Y-m-d", $item->waktu);
                      if ($a != $date->format("Y")) {
                        if ($a!=0)
                        { ?>
                      <?php }
                        $a = $date->format("Y");

                ?>

                <div class="hgroup" >
                  <h4 style="color:#515151;font-size:18px;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><?= $date->format("Y")?></h4>
                </div>
                <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><li>Pada tahun <?= $date->format("Y") ?> sebagai <?= $item->sebagai ?> pada <?= $item->nama_seminar?>, <?= $item->tema?> bertempat di <?= $item->tempat ?>
                </h4></li>
              <?php } else { ?>
              <?php
                $a = $date->format("Y"); ?>
                <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><li>Pada tahun <?= $date->format("Y") ?> sebagai <?= $item->sebagai ?> pada <?= $item->nama_seminar?>, <?= $item->tema?> bertempat di <?= $item->tempat ?>
                </h4></li>
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