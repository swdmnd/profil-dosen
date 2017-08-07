<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Identitas Diri</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/identitas", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap (dengan gelar)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap" value="<?= $identitas->nama_lengkap ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="jabatan_fungsional" class="col-sm-2 control-label">Jabatan fungsional</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" placeholder="Jabatan fungsional" value="<?= $identitas->jabatan_fungsional ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="jabatan_struktural" class="col-sm-2 control-label">Jabatan struktural</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan_struktural" name="jabatan_struktural" placeholder="Jabatan struktural" value="<?= $identitas->jabatan_struktural ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">NIP/NIK/No. Identitas lain</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= $identitas->no_induk ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="nidn" class="col-sm-2 control-label">NIDN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NIDN" value="<?= $identitas->nidn ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tempat_lahir" class="col-sm-2 control-label">Tempat lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" value="<?= $identitas->tempat_lahir ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal lahir" value="<?= datetostr($identitas->tanggal_lahir) ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_rumah" class="col-sm-2 control-label">Alamat rumah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" placeholder="Alamat rumah" value="<?= $identitas->alamat_rumah ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="kontak_rumah" class="col-sm-2 control-label">Nomor telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak_rumah" name="kontak_rumah" placeholder="Nomor telepon rumah" value="<?= $identitas->kontak_rumah ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="kontak_hp" class="col-sm-2 control-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak_hp" name="kontak_hp" placeholder="Nomor HP" value="<?= $identitas->kontak_hp ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_kantor" class="col-sm-2 control-label">Alamat kantor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" placeholder="Alamat kantor" value="<?= $identitas->alamat_kantor ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="kontak_kantor" class="col-sm-2 control-label">Nomor telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak_kantor" name="kontak_kantor" placeholder="Nomor telepon kantor" value="<?= $identitas->kontak_kantor ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Alamat e-mail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Alamat e-mail" value="<?= $identitas->email ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="meluluskan" class="col-sm-2 control-label">Lulusan yang telah dihasilkan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="meluluskan" name="meluluskan" placeholder="Lulusan yang telah dihasilkan" value="<?= $identitas->meluluskan ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="mk_diampu" class="col-sm-2 control-label">Mata kuliah yang diampu</label>
                <div class="col-sm-10">
                    <select class="form-control" style="width:100%" id="mk_diampu" name="mk_diampu[]"  multiple="multiple">
                      <?php
                        $x = unserialize($identitas->mk_diampu);
                        foreach($x as $y){
                          echo "<option value='$y' selected>$y</option>";
                        }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<div class="panel panel-default" id="pendidikan">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;Riwayat Pendidikan</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/pendidikan", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="tingkat" class="col-sm-2 control-label">Tingkat</label>
                <div class="col-sm-10">
                    <select class="form-control select2" id="tingkat" name="tingkat" style="width: 100%;">
                        <option selected="selected">D3</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_pt" class="col-sm-2 control-label">Nama Perguruan Tinggi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Nama Perguruan Tinggi" required>
                </div>
            </div>
            <div class="form-group">
                <label for="bidang_ilmu" class="col-sm-2 control-label">Bidang Ilmu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bidang_ilmu" name="bidang_ilmu" placeholder="Bidang Ilmu" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun_masuk" class="col-sm-2 control-label">Tahun Masuk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control tahun" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun Masuk" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun_lulus" class="col-sm-2 control-label">Tahun Lulus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control tahun" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus" required>
                </div>
            </div>
            <div class="form-group">
                <label for="judul_ta" class="col-sm-2 control-label">Judul Tugas Akhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_ta" name="judul_ta" placeholder="Judul Tugas Akhir" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pembimbing" class="col-sm-2 control-label">Nama Pembimbing</label>
                <div class="col-sm-10">
                  <select multiple class="form-control" id="pembimbing" name="pembimbing[]" required></select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>
    </div>
    
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
</div>

<div class="panel panel-default" id="pekerjaan">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-briefcase"></i>&nbsp;&nbsp;Riwayat Pekerjaan</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/pekerjaan", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="nama_pt" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Gol. IV A / Pembina" required>
                </div>
            </div>
            <div class="form-group">
                <label for="bidang_ilmu" class="col-sm-2 control-label">Tahun Menjabat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control tahun" id="tahun" name="tahun" placeholder="Bidang Ilmu" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>


      <table class="table <?= empty($pekerjaan) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Jabatan</th>
                  <th>Masa Jabatan</th>
                  <th>Pilihan</th>
              </tr>
          </thead>

          <tbody>
              <?php
                  $i=0;
                  if(empty($pekerjaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                  foreach($pekerjaan as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->jabatan ?></td><td><?= $item->tahun ?></td>
                      <td>
                          <div class="btn-group">
                            <a type="button" class="btn btn-default btn-flat">Action</a>
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
  </div>
</div>

<div class="panel panel-default" id="penelitian">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-tint"></i>&nbsp;&nbsp;Pengalaman Penelitian</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/penelitian", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="tahun_mulai" class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" class="form-control tahun" id="tahun_mulai" name="tahun_mulai" placeholder="2013" required>
                    <div class="input-group-addon">hingga</div>
                    <input type="text" class="form-control tahun" id="tahun_selesai" name="tahun_selesai" placeholder="2014" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label for="judul" class="col-sm-2 control-label">Judul Penelitian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul penelitian" required>
                    <input type="text" class="form-control" id="tipe" name="tipe" style="display:none" value="penelitian" required>
                </div>
            </div>
            <div class="form-group">
                <label for="sumber_dana" class="col-sm-2 control-label">Sumber Dana</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana" required>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_dana" class="col-sm-2 control-label">Jumlah Pendanaan (Rupiah)</label>
                <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-addon">Rp</div>
                      <input type="text" class="form-control nominal" id="jumlah_dana" name="jumlah_dana" placeholder="10 untuk Rp 10.000.000" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-10">
                    <select class="form-control tags" style="width:100%" name="tags[]"  multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>

      <table class="table <?= empty($penelitian) && empty($penelitian_extra) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th rowspan="2" style="vertical-align:middle;">No.</th>
                  <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                  <th rowspan="2" style="vertical-align:middle;">Judul Penelitian</th>
                  <th colspan="2"><center>Pendanaan</center></th>
                  <th rowspan="2" style="vertical-align:middle;">Pilihan</th>
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
                          <td>
                          <div class="btn-group">
                            <a href="<?= site_url(); ?>/home/mydocuments?sd=penelitian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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
                          </td>
              </tr>
              <?php
                  endforeach;
                  foreach($penelitian_extra as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= number_format($item->jumlah_dana, 0, ',', '.') ?></td>
                          <td>
                          <div class="btn-group">
                            <a href="<?= site_url(); ?>/home/mydocuments?sd=penelitian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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
                          </td>
              </tr>
              <?php
                  endforeach;
                  }
              ?>
          </tbody>
      </table>
  </div>
</div>

<div class="panel panel-default" id="pengabdian">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-leaf"></i>&nbsp;&nbsp;Pengalaman Pengabdian Kepada Masyarakat</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/penelitian", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="tahun_mulai" class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" class="form-control tahun" id="tahun_mulai" name="tahun_mulai" placeholder="2013" required>
                    <div class="input-group-addon">hingga</div>
                    <input type="text" class="form-control tahun" id="tahun_selesai" name="tahun_selesai" placeholder="2014" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label for="judul" class="col-sm-2 control-label">Judul Pengabdian Kepada Masyarakat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul pengabdian" required>
                    <input type="text" class="form-control" id="tipe" name="tipe" style="display:none" value="pengabdian" required>
                </div>
            </div>
            <div class="form-group">
                <label for="sumber_dana" class="col-sm-2 control-label">Sumber Dana</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana" required>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_dana" class="col-sm-2 control-label">Jumlah Pendanaan (Rupiah)</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-addon">Rp</div>
                      <input type="text" class="form-control nominal" id="jumlah_dana" name="jumlah_dana" placeholder="10 untuk Rp 10.000.000" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-10">
                    <select class="form-control tags" style="width:100%" name="tags[]"  multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>

      <table class="table <?= empty($pengabdian) && empty($pengabdian_extra) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th rowspan="2" style="vertical-align:middle;">No.</th>
                  <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                  <th rowspan="2" style="vertical-align:middle;">Judul Pengabdian</th>
                  <th colspan="2"><center>Pendanaan</center></th>
                  <th rowspan="2" style="vertical-align:middle;">Pilihan</th>
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
                          <td>
                          <div class="btn-group">
                            <a href="<?= site_url(); ?>/home/mydocuments?sd=pengabdian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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
                          </td>
              </tr>
              <?php
                  endforeach;
                  foreach($pengabdian_extra as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= number_format($item->jumlah_dana, 0, ',', '.') ?></td>
                          <td>
                          <div class="btn-group">
                            <a href="<?= site_url(); ?>/home/mydocuments?sd=pengabdian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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
                          </td>
              </tr>
              <?php
                  endforeach;
              ?>
          </tbody>
      </table>
  </div>
</div>

<div class="panel panel-default" id="jurnal">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Pengalaman Penulisan Artikel Ilmiah dalam Jurnal</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/publikasi", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="tahun" class="col-sm-2 control-label">Tahun Publikasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control tahun" id="tahun" name="tahun" placeholder="Tahun publikasi" required>
                </div>
            </div>
            <div class="form-group">
                <label for="judul" class="col-sm-2 control-label">Judul Artikel Ilmiah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel Ilmiah" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_jurnal" class="col-sm-2 control-label">Nama Jurnal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_jurnal" name="nama_jurnal" placeholder="Nama jurnal" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nomor_jurnal" class="col-sm-2 control-label">Volume/Nomor Jurnal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_jurnal" name="nomor_jurnal" placeholder="Volume/Nomor jurnal" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-10">
                    <select class="form-control tags" style="width:100%" name="tags[]"  multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>

      <table class="table <?= empty($publikasi) && empty($publikasi_extra) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Judul Artikel Ilmiah</th>
                  <th>Volume/Nomor</th>
                  <th>Nama Jurnal</th>
                  <th>Pilihan</th>
              </tr>
          </thead>

          <tbody>
              <?php
                  $i=0;
                  if(empty($publikasi) && empty($publikasi_extra)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                  foreach($publikasi as $item):
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
  </div>
</div>

<div class="panel panel-default" id="seminar">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-share"></i>&nbsp;&nbsp;Pemakalah Seminar</h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/save/seminar", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="nama_seminar" class="col-sm-2 control-label">Nama Seminar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_seminar" name="nama_seminar" placeholder="Nama Seminar" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tema" class="col-sm-2 control-label">Judul Artikel Ilmiah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tema" name="tema" placeholder="Judul Artikel Ilmiah" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tempat" class="col-sm-2 control-label">Tempat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat pelaksanaan seminar" required>
                </div>
            </div>
            <div class="form-group">
                <label for="waktu" class="col-sm-2 control-label">Waktu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Waktu pelaksanaan seminar" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-10">
                    <select class="form-control tags" style="width:100%" name="tags[]"  multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>

      <table class="table <?= empty($seminar) ? "":"dtable" ?>">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Nama Pertemuan Ilmiah/Seminar</th>
                  <th>Judul Artikel Ilmiah</th>
                  <th>Waktu dan Tempat</th>
                  <th>Pilihan</th>
              </tr>
          </thead>

          <tbody>
              <?php
                  $i=0;
                  if(empty($seminar)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</center></h2></td></tr>';
                  foreach($seminar as $item):
              ?>
                      <tr><td><?= ++$i ?></td><td><?= $item->nama_seminar ?></td><td><?= $item->tema ?></td><td><?= $item->tempat.' '.$item->waktu ?></td><td>
                          <div class="btn-group">
                            <a href="<?= site_url(); ?>/home/mydocuments?sd=seminar&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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
  </div>
</div>

<script src="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script>
    $('#tanggal_lahir').datepicker({
        autoclose: true,
        format: "d MM yyyy",
        language: "id"
    });
    $('#waktu').datepicker({
        autoclose: true,
        format: "d MM yyyy",
        language: "id"
    });
    $(".tahun").datepicker( {
      format: "yyyy", // Notice the Extra space at the beginning
      viewMode: "years", 
      minViewMode: "years"
    });
    $(".select2").select2();
    $("#mk_diampu").select2({
      placeholder:"  Pisahkan dengan koma",
      tags:[],
      tokenSeparators: [','],
      minimumResultsForSearch: -1
    });
    $("#pembimbing").select2({
      placeholder:"  Pisahkan dengan koma",
      tags:[],
      tokenSeparators: [','],
      minimumResultsForSearch: -1
    });
    $(".tags").each(function(){
      $(this).select2({
        placeholder:"  Pisahkan dengan koma",
        tags:[],
        tokenSeparators: [','],
        minimumResultsForSearch: -1
      });
    });
    $(".nominal").mask("#.##0", {reverse: true});
    
    var table = $(".dtable").DataTable();

    table.on( 'draw', function () {
      var body = $( table.table().body() );

      body.unhighlight({ element: 'b'});
      body.highlight( table.search(), { element: 'b'} );  
    });

</script>