
<div class="main-header">


          <div class="row">

            <div class="col-md-9">
              <div class=" profile margBSmall">
              <h1 style="font-size:18px;text-transform:capitalize;margin-bottom:-10px">Publikasi Ilmiah</h1>
              </div>
                <?php
                    if(empty($publikasi)) echo '<h4>-</h4>';
                    $a = 0;
                      $publikasilengkap = '';
                      foreach($publikasi as $item):
                        $penulisarray = explode(",",$item->penulis);
                        $jml = count($penulisarray);
                        $penulis = '';
                        for ($x = 0; $x < $jml; $x++) {
                        if ($x!=$jml-1)
                        {
                          $penulis .= implode(' ',array_reverse(explode(' ',$penulisarray[$x]))) . ", ";
                        }
                        else
                        {
                          $penulis .= implode(' ',array_reverse(explode(' ',$penulisarray[$x])));
                        }
                        }
                        $tahun = "(" . $item->tahun . ")";
                        $judul = $item->judul;
                        $nama_jurnal = "In " . $item->nama_jurnal;
                        $nomor_jurnal = " (" . $item->nomor_jurnal . ")";
                        $publikasilengkap = $penulis . " . " . $tahun . " . " . $judul . " . " . $nama_jurnal . $nomor_jurnal . ".";
                      if ($a != $item->tahun) {
                        if ($a!=0)
                        { ?>

                      <?php }
                        $a = $item->tahun;

                ?>
                <div class="hgroup" >
                  <h4 style="color:#515151;font-size:18px;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><?= $item->tahun?></h4>
                </div>
                <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><li><?= $publikasilengkap ?>
                </h4></li>
              <?php } else { ?>
              <?php
                $a = $item->tahun;
                ?>
                <h4 style="color:#515151;text-align:justify;font-family:candara, sans-serif;line-height: 100%;text-transform:capitalize;"><li><?= $publikasilengkap ?>
              </h4>
            </li>
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
