<div class="row">
<div class="col-md-9">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Pencarian</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form class="form-horizontal" method="get" role="search">
        <div class="form-group">
            <label for="nama_lengkap" class="col-sm-2 control-label">Kata kunci</label>
            <div class="col-sm-10">
                <input type="text" name="q" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Kata kunci pencarian" value="<?= $this->input->get("q") ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="jabatan_fungsional" class="col-sm-2 control-label">Kategori</label>
            <div class="col-sm-10">
              <select class="form-control cat" name="cat" style="width:100%">
                <optgroup label="Dosen">
                  <option value="dosen_nama">Dosen - Nama</option>
                  <option value="dosen_nik">Dosen - NIK</option>
                </optgroup>
                <optgroup label="Penelitian">
                  <option value="penelitian_judul">Penelitian - Judul</option>
                  <option value="penelitian_tahun">Penelitian - Tahun</option>
                  <option value="penelitian_tag">Penelitian - tag</option>
                </optgroup>
                <optgroup label="Pengabdian">
                  <option value="pengabdian_judul">Pengabdian - Judul</option>
                  <option value="pengabdian_tahun">Pengabdian - Tahun</option>
                  <option value="pengabdian_tag">Pengabdian - Tag</option>
                </optgroup>
                <optgroup label="Publikasi">
                  <option value="publikasi_judul">Publikasi - Judul jurnal</option>
                  <option value="publikasi_tahun">Publikasi - Tahun</option>
                  <option value="publikasi_nomor">Publikasi - Nomor Jurnal</option>
                  <option value="publikasi_tag">Publikasi - Tag</option>
                </optgroup>
              </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" type="submit">Cari</button>
            </div>
        </div>
      </form>
      
      <?php if(isset($table_data)): ?>
      <?php if(empty($table_data->thead)): ?>
      <div class="alert alert-danger">Tidak ditemukan.</div>
      <?php else:?>
      <table class="table table-striped dtable">
        <thead>
          <tr>
          <th>No.</th>
          <?php
            foreach($table_data->thead as $thead){
              echo "<th>$thead</th>";
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=0;
            foreach($table_data->tbody as $tbody){
              echo "<tr>";
              echo "<td>".++$i."</td>";
              foreach($tbody as $key=>$value){
                echo "<td>$value</td>";
              }
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
      <?php endif; ?>
      <?php endif; ?>
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
<div class="col-md-3">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Entri terakhir</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <dl>
        <dt>Jojo</dt>
        <dd>
          <ul>
            <li>jaja</li>
            <li>jajak</li>
          </ul>
        </dd>
      </dl>
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
  
<?php if(isset($show_dosen)): ?>
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Profil Dosen</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-horizontal">
        <div class="form-group">
            <label for="nama_lengkap" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?= $identitas->nama_lengkap ? $identitas->nama_lengkap : "-" ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_lengkap" class="col-sm-2 control-label">Nomor Induk</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?= $identitas->no_induk ? $identitas->no_induk : "-" ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_lengkap" class="col-sm-2 control-label">Jabatan Fungsional</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?= $identitas->jabatan_fungsional ? $identitas->jabatan_fungsional : "-" ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_lengkap" class="col-sm-2 control-label">Jabatan Struktural</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?= $identitas->jabatan_struktural ? $identitas->jabatan_struktural : "-" ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_lengkap" class="col-sm-2 control-label">Mata Kuliah yang Diampu</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?= $identitas->mk_diampu ? implode(', ', unserialize($identitas->mk_diampu)) : "-" ?></p>
            </div>
        </div>
      </div>
      <br>
      <!-- pendidikan -->
      <h4>Pendidikan</h4>
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
        <thead>
          <tr><th><center>Riwayat Pendidikan</center></th></tr>
        </thead>
        <tbody>
          <tr><td><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>
        </tbody>
        <?php endif;?>
      </table>
      
      <br>
      <!-- Penelitian -->
      <h4>Penelitian</h4>
      <table class="table <?= empty($penelitian) && empty($penelitian_extra) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th rowspan="2" style="vertical-align:middle;">No.</th>
                  <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                  <th rowspan="2" style="vertical-align:middle;">Judul Penelitian</th>
                  <th colspan="2"><center>Pendanaan</center></th>
              </tr>
              <tr>
                  <th>Sumber</th>
                  <th>Jumlah (Rupiah)</th>
              </tr>
          </thead>

          <tbody>
              <?php
                  $i=0;
                  if(empty($penelitian) && empty($penelitian_extra)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                  else{
                  foreach($penelitian as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= number_format($item->jumlah_dana, 0, ',', '.') ?></td>
                          
              </tr>
              <?php
                  endforeach;
                  foreach($penelitian_extra as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= number_format($item->jumlah_dana, 0, ',', '.') ?></td>
                          
              </tr>
              <?php
                  endforeach;
                  }
              ?>
          </tbody>
      </table>
      
      <br>
      <!-- Pengabdian -->
      <h4>Pengabdian</h4>
      <table class="table <?= empty($pengabdian) && empty($pengabdian_extra) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th rowspan="2" style="vertical-align:middle;">No.</th>
                  <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                  <th rowspan="2" style="vertical-align:middle;">Judul Pengabdian</th>
                  <th colspan="2"><center>Pendanaan</center></th>
              </tr>
              <tr>
                  <th>Sumber</th>
                  <th>Jumlah (Rupiah)</th>
              </tr>
          </thead>

          <tbody>
              <?php
                  $i=0;
                  if(empty($pengabdian) && empty($pengabdian_extra)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                  foreach($pengabdian as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= number_format($item->jumlah_dana, 0, ',', '.') ?></td>
                          
              </tr>
              <?php
                  endforeach;
                  foreach($pengabdian_extra as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= number_format($item->jumlah_dana, 0, ',', '.') ?></td>
                          
              </tr>
              <?php
                  endforeach;
              ?>
          </tbody>
      </table>
      
      <br>
      <!-- Publikasi -->
      <h4>Publikasi</h4>
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
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun ?></td><td><?= $item->judul ?></td><td><?= $item->nomor_jurnal ?></td><td><?= $item->nama_jurnal ?></td><td>
                          <div class="btn-group">
                            <a href="<?= site_url(); ?>/home/mydocuments?sd=publikasi&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
                            <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                            </ul>
                          </div>
                          </td></tr>
              <?php
                  endforeach;
              ?>
          </tbody>
      </table>
      
      <br>
      <!-- Seminar -->
      <h4>Seminar</h4>
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
<?php endif; ?>

<?php if(isset($show_research)): ?>
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Data <?= $judul ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?php foreach($research_data[0] as $key=>$value):
              if($key=="id" || $key=="tipe" || $key=="uid" || $key=="timestamp") continue;
      ?>
          <div class="form-group">
              <label for="dir_name" class="col-sm-2 control-label"><?= ucfirst(implode(" ", explode("_", $key))) ?></label>
              <div class="col-sm-10">

                  <p class="form-control-static" ><?= (($key == "jumlah_dana") ? "Rp ". number_format($value, 0, ',', '.'):(($key == "tags") ? implode(', ', explode(',', $value)):$value)) ?></p>

              </div>
          </div>
      <?php endforeach; ?>
      <?php if(isset($research_members)): ?>
        <div class="form-group">
            <label for="dir_name" class="col-sm-2 control-label">Ketua:</label>
            <div class="col-sm-10">
                  <p class="form-control-static" ><?= $research_members->ketua->nama_ketua; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="dir_name" class="col-sm-2 control-label">Anggota:</label>
            <div class="col-sm-10">
              <ol class="form-control-static">
              <?php foreach($research_members->anggota as $a): ?>
                <li><?= "(".$a->no_induk.") ".$a->nama_lengkap; ?></li>
              <?php endforeach; ?>
              </ol>
            </div>
        </div>
      <?php endif; ?>
      
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
<?php endif; ?>
</div>
<script>
var table = $(".dtable").DataTable();

table.on( 'draw', function () {
  var body = $( table.table().body() );

  body.unhighlight({ element: 'b'});
  body.highlight( table.search(), { element: 'b'} );  
});
</script>