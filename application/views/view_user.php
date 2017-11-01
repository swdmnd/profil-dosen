<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div>
          <center>
            <img src="<?= site_url()."/getfile/profileimage/0/".$dosen->no_induk ?>" alt="<?= $dosen->nama_lengkap ?>" style="width:320px; height:auto;" />
            <br>
            <h2><strong><?= $dosen->nama_lengkap ?></strong></h2>
          </center>
          <h3><strong>Profil</strong></h3>
          <div class="form-horizontal">
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap (dengan gelar)</label>
                <div class="col-sm-10">
                  <p class="form-control-static" id="nama_lengkap"><?= $dosen->nama_lengkap ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">NIP</label>
                <div class="col-sm-10">
                  <p class="form-control-static" id="nama_lengkap"><?= $dosen->no_induk ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Mata kuliah yang diampu</label>
                <div class="col-sm-10">
                  <p class="form-control-static" id="nama_lengkap"><?= $dosen->mk_diampu ?></p>
                </div>
            </div>
          </div>
          
          <hr>
          <h3><strong>Riwayat Pendidikan</strong></h3>
          <table class="table">
              <?php if(!empty((array)$pendidikan)):?>
              <thead>
                  <tr>
                      <th></th>
                      <?php
                          foreach($pendidikan->tingkat as $item):
                      ?>
                                  <th><?= $item ?></th>
                      <?php
                          endforeach;
                      ?>
                  </tr>
              </thead>

              <tbody>
                  <tr>
                      <th>Nama PT</th>
                      <?php
                          foreach($pendidikan->nama_pt as $item):
                      ?>
                                  <td><?= $item ?></td>
                      <?php
                          endforeach;
                      ?>
                  </tr>
                  <tr>
                      <th>Bidang Ilmu</th>
                      <?php
                          foreach($pendidikan->bidang_ilmu as $item):
                      ?>
                                  <td><?= $item ?></td>
                      <?php
                          endforeach;
                      ?>
                  </tr>
                  <tr>
                      <th>Tahun Masuk</th>
                      <?php
                          foreach($pendidikan->tahun_masuk as $item):
                      ?>
                                  <td><?= $item ?></td>
                      <?php
                          endforeach;
                      ?>
                  </tr>
                  <tr>
                      <th>Tahun Lulus</th>
                      <?php
                          foreach($pendidikan->tahun_lulus as $item):
                      ?>
                                  <td><?= $item ?></td>
                      <?php
                          endforeach;
                      ?>
                  </tr>
                  <tr>
                      <th>Judul Tugas Akhir</th>
                      <?php
                          foreach($pendidikan->judul_ta as $item):
                      ?>
                                  <td><?= $item ?></td>
                      <?php
                          endforeach;
                      ?>
                  </tr>
                  <tr>
                      <th>Nama Pembimbing/Promotor</th>
                      <?php
                          foreach($pendidikan->pembimbing as $item):
                      ?>
                                  <td><?= $item ?></td>
                      <?php
                          endforeach;
                      ?>
                  </tr>
              </tbody>
            <?php else:?>
            <tbody>
              <tr><td><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>
            </tbody>
            <?php endif;?>
          </table>
          
          <hr>
          <h3><strong>Riwayat Penelitian</strong></h3>
          <table class="table <?= empty($penelitian) && empty($penelitian_extra) ? "":"dtable" ?>">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Tahun</th>
                      <th>Judul Penelitian</th>
                      <th>Sumber Dana</th>
                  </tr>
              </thead>

              <tbody>
                  <?php
                      $i=0;
                      if(empty($penelitian) && empty($penelitian_extra)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                      else{
                      foreach($penelitian as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td>
                  </tr>
                  <?php
                      endforeach;
                      foreach($penelitian_extra as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td>
                  </tr>
                  <?php
                      endforeach;
                      }
                  ?>
              </tbody>
          </table>
          
          <hr>
          <h3><strong>Riwayat Pengabdian</strong></h3>
          <table class="table <?= empty($pengabdian) && empty($pengabdian_extra) ? "":"dtable" ?>">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Tahun</th>
                      <th>Judul Pengabdian</th>
                      <th>Sumber Dana</th>
                  </tr>
              </thead>

              <tbody>
                  <?php
                      $i=0;
                      if(empty($pengabdian) && empty($pengabdian_extra)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                      foreach($pengabdian as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td>
                  </tr>
                  <?php
                      endforeach;
                      foreach($pengabdian_extra as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td>
                  </tr>
                  <?php
                      endforeach;
                  ?>
              </tbody>
          </table>
          
          <hr>
          <h3><strong>Riwayat Publikasi</strong></h3>
          <table class="table <?= empty($publikasi) && empty($publikasi_extra) ? "":"dtable" ?>">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Tahun</th>
                      <th>Judul Artikel Ilmiah</th>
                      <th>Volume/Nomor</th>
                      <th>Nama Jurnal</th>
                  </tr>
              </thead>

              <tbody>
                  <?php
                      $i=0;
                      if(empty($publikasi) && empty($publikasi_extra)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                      foreach($publikasi as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->tahun ?></td><td><?= $item->judul ?></td><td><?= $item->nomor_jurnal ?></td><td><?= $item->nama_jurnal ?></td></tr>
                  <?php
                      endforeach;
                      foreach($publikasi_extra as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->tahun ?></td><td><?= $item->judul ?></td><td><?= $item->nomor_jurnal ?></td><td><?= $item->nama_jurnal ?></td></tr>
                  <?php
                      endforeach;
                  ?>
              </tbody>
          </table>
          
          <hr>
          <h3><strong>Riwayat Seminar</strong></h3>
          <table class="table <?= empty($seminar) ? "":"dtable" ?>">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Nama Pertemuan Ilmiah/Seminar</th>
                      <th>Judul Artikel Ilmiah</th>
                      <th>Waktu dan Tempat</th>
                  </tr>
              </thead>

              <tbody>
                  <?php
                      $i=0;
                      if(empty($seminar)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                      foreach($seminar as $item):
                  ?>
                          <tr><td><?= ++$i ?></td><td><?= $item->nama_seminar ?></td><td><?= $item->tema ?></td><td><?= $item->tempat.' '.$item->waktu ?></td></tr>
                  <?php
                      endforeach;
                  ?>
              </tbody>
          </table>
          
        </div>
      </div>
      <!-- /.box-body -->
  <!--
      <div class="box-footer">
        The footer of the box
      </div>
  -->
      <!-- box-footer -->
    </div>
    <!-- /.box -->
  </div>
</div>

<script>
    var table = $(".dtable").DataTable();

    table.on( 'draw', function () {
      var body = $( table.table().body() );

      body.unhighlight({ element: 'b'});
      body.highlight( table.search(), { element: 'b'} );  
    });

</script>