<div class="main-title">
        <h1>Riwayat Pekerjaan</h1>
</div>

      <div class="content">
        <div class="block-content margBSmall">

          <div class="row">

            <div class="col-md-12">

                <?php
                    if(empty($pekerjaan)) echo '<h4>-</h4>';
                    $a = 0;

                    foreach($pekerjaan as $item):

                      if ($a != $item->tahun_mulai) {
                        if ($a!=0)
                        { ?>
                        </div>
                      <?php }
                        $a = $item->tahun_mulai;

                ?>
                <div class="exp">
                <div class="hgroup" >
                  <h4><?= $item->tahun_mulai?> - <?= $item->tahun_selesai?></h4>
                </div>
                <p style="color:black"><?= $item->jabatan?></p>
              <?php } else { ?>
              <?php
                $a = $item->tahun_mulai; ?>
                <p style="color:black"><?= $item->jabatan?></p>
            <?php
          }
                endforeach;
                ?>

            </div>

          </div>

        </div>
</div>
