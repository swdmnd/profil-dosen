<link rel="<?= base_url(); ?>assets/css/bootstrap-tagsinput.css">

<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <h4><img src="<?= base_url() . $identitas->foto?>" width="100px" height="120px" class="img-circle">&nbsp;&nbsp;Identitas Diri</h4>
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
        <?= form_open_multipart(site_url()."/home/save/identitas", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap (dengan gelar)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap" value="<?= $identitas->nama_lengkap ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="prodi" class="col-sm-2 control-label">Program Studi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" list="listprodi" value="<?= $identitas->prodi ?>">
					<datalist id='listprodi'>
					<?php
                    foreach($prodi->nm_prodi as $item):
					?>
                    <option value='<?= $item ?>'>
					<?php
                    endforeach;
					?>
					</datalist>
				</div>
            </div>
            <div class="form-group">
                <label for="deskripsi_singkat" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" placeholder="Deskripsi Singkat"><?= $identitas->deskripsi_singkat ?></textarea>
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
			<!--
            <div class="form-group">
                <label for="no_induk" class="col-sm-2 control-label">NIP/NIK/No. Identitas lain</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= $identitas->no_induk ?></p>
                </div>
            </div>
			-->
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
                <div class="col-sm-10 form-horizontal">
					<?php
					$meluluskan = $identitas->meluluskan;
					if ($meluluskan!='')
					{
					preg_match_all("/([^,= ]+):([^,= ]+)/", $meluluskan, $r);
					$result = array_combine($r[1], $r[2]);
					?>
                    <label for="D3" class="col-sm-2 control-label">D3</label><div class="col-sm-10"><input type="text" class="form-control" id="jumlahlulusanD3" name="D3" placeholder="Jumlah D3" value="<?= $result['D3']?>"></div>
                    <label for="S1" class="col-sm-2 control-label">S1</label><div class="col-sm-10"><input type="text" class="form-control" id="jumlahlulusanS1" name="S1" placeholder="Jumlah S1" value="<?= $result['S1']?>"></div>
                    <label for="Profesi" class="col-sm-2 control-label">Profesi</label><div class="col-sm-10"><input type="text" class="form-control" id="jumlahlulusanPr" name="Pr" placeholder="Jumlah Profesi" value="<?= $result['Pr']?>"></div>
                    <label for="S2" class="col-sm-2 control-label">S2</label><div class="col-sm-10"><input type="text" class="form-control" id="jumlahlulusanS2" name="S2" placeholder="Jumlah S2" value="<?= $result['S2']?>"></div>
                    <label for="S3" class="col-sm-2 control-label">S3</label><div class="col-sm-10"><input type="text" class="form-control" id="jumlahlulusanS3" name="S3" placeholder="Jumlah S3" value="<?= $result['S3']?>"></div>
					<?php
					}
					else
					{
					?>
                    <label for="D3" class="col-sm-2 control-label">D3</label><input type="text" class="form-control" id="jumlahlulusanD3" name="D3" placeholder="Jumlah D3" value="">
                    <label for="S1" class="col-sm-2 control-label">S1</label><input type="text" class="form-control" id="jumlahlulusanS1" name="S1" placeholder="Jumlah S1" value="">
                    <label for="Profesi" class="col-sm-2 control-label">Profesi</label><input type="text" class="form-control" id="jumlahlulusanPr" name="Pr" placeholder="Jumlah Profesi" value="">
                    <label for="S2" class="col-sm-2 control-label">S2</label><input type="text" class="form-control" id="jumlahlulusanS2" name="S2" placeholder="Jumlah S2" value="">
                    <label for="S3" class="col-sm-2 control-label">S3</label><input type="text" class="form-control" id="jumlahlulusanS3" name="S3" placeholder="Jumlah S3" value="">
					<?php
					}
					?>
					<label class="col-sm-2"></label><div class="col-sm-2"><button>Jumlahkan</button>
                    <input type="hidden" class="form-control" id="meluluskan" name="meluluskan" placeholder="Lulusan yang telah dihasilkan" value=<?= $identitas->meluluskan ?>>
                </div>
            </div>
            <div class="form-group">
                <label for="mk_diampu" class="col-sm-2 control-label">Mata kuliah yang diampu</label>
                <div class="col-sm-10" style="margin-top:10px">
                    <input type="text" class="form-control" data-role="tagsinput" id="mk_diampu" name="mk_diampu" placeholder="Pisahkan dengan koma" value="<?= $identitas->mk_diampu ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="research_interests" class="col-sm-2 control-label">Research Interest</label>
                <div class="col-sm-10" style="margin-top:5px">
                    <input type="text" class="form-control" data-role="tagsinput" id="research_interests" name="research_interests" placeholder="Pisahkan dengan koma" value="<?= $identitas->research_interests ?>">
				</div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Pilih Foto</label>
                <div class="col-sm-10" style="margin-top:5px">
                        <input type="file" name="foto" />
				</div>
            </div>
    <br />
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
                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun Masuk" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun_lulus" class="col-sm-2 control-label">Tahun Lulus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus" required>
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
                    <input type="text" class="form-control" id="pembimbing" name="pembimbing" placeholder="Nama Pembimbing" required>
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
        <thead>
            <tr>
                <th></th>
                <?php
                    foreach($pendidikan->tingkat as $item => $value):
                ?>
                            <th><span class='span-pendidikan-tingkat caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tingkat'] ?></span> <input style='display: none; type='text' class='field-pendidikan-tingkat form-control editor-pendidikan' value='<?= $value['tingkat'] ?>' data-id='<?= $value['id'] ?>' /></th>
                <?php
                    endforeach;
                ?>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th>Nama PT</th>
                <?php
                    foreach($pendidikan->nama_pt as $item => $value):
                ?>
                            <td><span class='span-pendidikan-nama_pt caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['nama_pt'] ?></span> <input style='display: none; type='text' class='field-pendidikan-nama_pt form-control editor-pendidikan' value='<?= $value['nama_pt'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Bidang Ilmu</th>
                <?php
                    foreach($pendidikan->bidang_ilmu as $item => $value):
                ?>
                            <td><span class='span-pendidikan-bidang_ilmu caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['bidang_ilmu'] ?></span> <input style='display: none; type='text' class='field-pendidikan-bidang_ilmu form-control editor-pendidikan' value='<?= $value['bidang_ilmu'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Tahun Masuk</th>
                <?php
                    foreach($pendidikan->tahun_masuk as $item => $value):
                ?>
                            <td><span class='span-pendidikan-tahun_masuk caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tahun_masuk'] ?></span> <input style='display: none; type='text' class='field-pendidikan-tahun_masuk form-control editor-pendidikan' value='<?= $value['tahun_masuk'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Tahun Lulus</th>
                <?php
                    foreach($pendidikan->tahun_lulus as $item => $value):
                ?>
                            <td><span class='span-pendidikan-tahun_lulus caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tahun_lulus'] ?></span> <input style='display: none; type='text' class='field-pendidikan-tahun_lulus form-control editor-pendidikan' value='<?= $value['tahun_lulus'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Judul Tugas Akhir</th>
                <?php
                    foreach($pendidikan->judul_ta as $item => $value):
                ?>
                            <td><span class='span-pendidikan-judul_ta caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['judul_ta'] ?></span> <input style='display: none; type='text' class='field-pendidikan-judul_ta form-control editor-pendidikan' value='<?= $value['judul_ta'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Nama Pembimbing/Promotor</th>
                <?php
                    foreach($pendidikan->pembimbing as $item => $value):
                ?>
                            <td><span class='span-pendidikan-pembimbing caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['pembimbing'] ?></span> <input style='display: none; type='text' class='field-pendidikan-pembimbing form-control editor-pendidikan' value='<?= $value['pembimbing'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
              <th>Aksi</th>
              <?php
                  foreach($pendidikan->id as $item):
              ?>
              <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><a href="#">Action</a>
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?= site_url() ?>/home/deletependidikan/<?= $item ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
                    </ul>
                  </div>
              </td>
              <?php
                  endforeach;
              ?>
            </tr>
        </tbody>
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
                    <input type="text" class="form-control" id="nama_pt" name="jabatan" placeholder="Gol. IV A / Pembina" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun_mulai" class="col-sm-2 control-label">Tahun Menjabat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="tahun_mulai" name="tahun_mulai" placeholder="Tahun Menjabat" required>
                </div>
                <label for="tahun_selesai" class="col-sm-1 control-label">hingga</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="tahun_selesai" name="tahun_selesai" placeholder="sekarang" required>
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
        <thead>
            <tr>
                <th>No.</th>
                <th>Tahun</th>
				        <th>hingga</th>
                <th>Jabatan</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($pekerjaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($pekerjaan as $item):
            ?>

                    <tr data-id="<?= $item->id ?>"><td><?= ++$i ?></td><td><span class='span-pekerjaan-tahun_mulai caption-pekerjaan' data-id='<?= $item->id ?>'><?= $item->tahun_mulai ?></span> <input style="display: none;" type='text' class='field-pekerjaan-tahun_mulai form-control editor-pekerjaan' value='<?= $item->tahun_mulai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pekerjaan-tahun_selesai caption-pekerjaan' data-id='<?= $item->id ?>'><?= $item->tahun_selesai ?></span> <input style="display: none;" type='text' class='field-pekerjaan-tahun_selesai form-control editor-pekerjaan' value='<?= $item->tahun_selesai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pekerjaan-jabatan caption-pekerjaan' data-id='<?= $item->id ?>'><?= $item->jabatan ?></span> <input style='display: none; type='text' class='field-pekerjaan-jabatan form-control editor-pekerjaan' value='<?= $item->jabatan ?>' data-id='<?= $item->id ?>' /></td>
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><a href="#">Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url() ?>/home/deletepekerjaan/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
                          </ul>
                        </div>
                        </td></tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
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
                    <input type="text" class="form-control" id="tahun_mulai" name="tahun_mulai" placeholder="2013" required>
                </div>
                <label for="tahun_selesai" class="col-sm-1 control-label"  style="text-align:center;">hingga</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="tahun_selesai" name="tahun_selesai" placeholder="2014" required>
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
                <label for="jumlah_dana" class="col-sm-2 control-label">Jumlah Pendanaan (Juta Rupiah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jumlah_dana" name="jumlah_dana" placeholder="10 untuk Rp 10.000.000" required>
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
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                <th rowspan="2" style="vertical-align:middle;">hingga</th>
                <th rowspan="2" style="vertical-align:middle;">Judul Penelitian</th>
                <th colspan="2"><center>Pendanaan</center></th>
                <th rowspan="2" style="vertical-align:middle;">Pilihan</th>
            </tr>
            <tr>
                <th>Sumber</th>
                <th>Jumlah (Juta Rupiah)</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($penelitian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($penelitian as $item):
            ?>
                    <tr data-id="<?= $item->id ?>"><td><?= ++$i ?></td><td><span class='span-penelitian-tahun_mulai caption-penelitian' data-id='<?= $item->id ?>'><?= $item->tahun_mulai ?></span> <input style="display: none;" type='text' class='field-penelitian-tahun_mulai form-control editor-penelitian' value='<?= $item->tahun_mulai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-tahun_selesai caption-penelitian' data-id='<?= $item->id ?>'><?= $item->tahun_selesai ?></span> <input style="display: none;" type='text' class='field-penelitian-tahun_selesai form-control editor-penelitian' value='<?= $item->tahun_selesai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-judul caption-penelitian' data-id='<?= $item->id ?>'><?= $item->judul ?></span> <input style='display: none; type='text' class='field-penelitian-judul form-control editor-penelitian' value='<?= $item->judul ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-sumber_dana caption-penelitian' data-id='<?= $item->id ?>'><?= $item->sumber_dana ?></span> <input style='display: none; type='text' class='field-penelitian-jumlah_dana form-control editor-penelitian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-jumlah_dana caption-penelitian' data-id='<?= $item->id ?>'><?= $item->jumlah_dana ?></span> <input style='display: none; type='text' class='field-penelitian-jumlah_dana form-control editor-penelitian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td>
                    <!--<tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td>-->
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href="#">Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=penelitian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deletepenelitian/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
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
                    <input type="text" class="form-control" id="tahun_mulai" name="tahun_mulai" placeholder="2013" required>
                </div>
                <label for="tahun_selesai" class="col-sm-1 control-label" style="text-align:center;">hingga</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="tahun_selesai" name="tahun_selesai" placeholder="2014" required>
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
                <label for="jumlah_dana" class="col-sm-2 control-label">Jumlah Pendanaan (Juta Rupiah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jumlah_dana" name="jumlah_dana" placeholder="10 untuk Rp 10.000.000" required>
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
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                <th rowspan="2" style="vertical-align:middle;">hingga</th>
                <th rowspan="2" style="vertical-align:middle;">Judul Pengabdian Kepada Masyarakat</th>
                <th colspan="2"><center>Pendanaan</center></th>
                <th rowspan="2" style="vertical-align:middle;">Pilihan</th>
            </tr>
            <tr>
                <th>Sumber</th>
                <th>Jumlah (Juta Rupiah)</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($pengabdian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($pengabdian as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= ++$i ?></td><td><span class='span-pengabdian-tahun_mulai caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->tahun_mulai ?></span> <input style="display: none;" type='text' class='field-pengabdian-tahun_mulai form-control editor-pengabdian' value='<?= $item->tahun_mulai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-tahun_selesai caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->tahun_selesai ?></span> <input style="display: none;" type='text' class='field-pengabdian-tahun_selesai form-control editor-pengabdian' value='<?= $item->tahun_selesai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-judul caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->judul ?></span> <input style='display: none; type='text' class='field-pengabdian-judul form-control editor-pengabdian' value='<?= $item->judul ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-sumber_dana caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->sumber_dana ?></span> <input style='display: none; type='text' class='field-pengabdian-jumlah_dana form-control editor-pengabdian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-jumlah_dana caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->jumlah_dana ?></span> <input style='display: none; type='text' class='field-pengabdian-jumlah_dana form-control editor-pengabdian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td>
                    <!--<tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td>-->
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href="#">Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=pengabdian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deletepengabdian/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
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
                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun publikasi" required>
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
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>
    </div>

    <table class="table">
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
                if(empty($publikasi)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($publikasi as $item):
            ?>
                    <!--<tr><td><?= ++$i ?></td><td><?= $item->tahun ?></td><td><?= $item->judul ?></td><td><?= $item->nomor_jurnal ?></td><td><?= $item->nama_jurnal ?></td><td>-->
            <tr data-id="<?= $item->id ?>"><td><?= ++$i ?></td><td><span class='span-publikasi-tahun caption-publikasi' data-id='<?= $item->id ?>'><?= $item->tahun ?></span> <input style="display: none;" type='text' class='field-publikasi-tahun form-control editor-publikasi' value='<?= $item->tahun ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-judul caption-publikasi' data-id='<?= $item->id ?>'><?= $item->judul ?></span> <input style="display: none;" type='text' class='field-publikasi-judul form-control editor-publikasi' value='<?= $item->judul ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-nomor_jurnal caption-publikasi' data-id='<?= $item->id ?>'><?= $item->nomor_jurnal ?></span> <input style='display: none; type='text' class='field-publikasi-nomor_jurnal form-control editor-publikasi' value='<?= $item->nomor_jurnal ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-nama_jurnal caption-publikasi' data-id='<?= $item->id ?>'><?= $item->nama_jurnal ?></span> <input style='display: none; type='text' class='field-publikasi-nama_jurnal form-control editor-publikasi' value='<?= $item->nama_jurnal ?>' data-id='<?= $item->id ?>' /></td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href="#">Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=publikasi&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deletepublikasi/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
                          </ul>
                        </div>
                        </td></tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
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
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>
    </div>

    <table class="table">
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
                if(empty($seminar)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
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
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();

    $("button").click(function(){
		document.getElementById("meluluskan").value = '';
		var D3 = $("#jumlahlulusanD3").serializeArray();
    var S1 = $("#jumlahlulusanS1").serializeArray();
		var Pr = $("#jumlahlulusanPr").serializeArray();
		var S2 = $("#jumlahlulusanS2").serializeArray();
		var S3 = $("#jumlahlulusanS3").serializeArray();

        $.each(D3, function(i, field){
			var value = 0;
			if (field.value=='')
			{
				value = 0;
			}
			else
			{
				value = field.value;
			}
			document.getElementById("meluluskan").value += field.name + ":" + value + ",";
        });
        $.each(S1, function(i, field){
			var value = 0;
			if (field.value=='')
			{
				value = 0;
			}
			else
			{
				value = field.value;
			}
			document.getElementById("meluluskan").value += field.name + ":" + value + ",";
        });
        $.each(Pr, function(i, field){
			var value = 0;
			if (field.value=='')
			{
				value = 0;
			}
			else
			{
				value = field.value;
			}
			document.getElementById("meluluskan").value += field.name + ":" + value + ",";
        });
        $.each(S2, function(i, field){
			var value = 0;
			if (field.value=='')
			{
				value = 0;
			}
			else
			{
				value = field.value;
			}
			document.getElementById("meluluskan").value += field.name + ":" + value + ",";
        });
        $.each(S3, function(i, field){
			var value = 0;
			if (field.value=='')
			{
				value = 0;
			}
			else
			{
				value = field.value;
			}
			document.getElementById("meluluskan").value += field.name + ":" + value ;
        });
		return false;
    });
});
</script>
<script src="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script src="<?= base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<script>
    $('#tanggal_lahir').datepicker({
        autoclose: true,
        format: "d MM yyyy",
        language: "id"
    });
    $(".select2").select2();
</script>
<script src="<?= base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
	type:"post",
	cache:false,
	dataType: "json"
})


$(document).on("click","th",function(){
$(this).find("span[class~='caption-pendidikan']").hide();
$(this).find("input[class~='editor-pendidikan']").fadeIn().focus();
});

$(document).on("click","td",function(){
$(this).find("span[class~='caption-pendidikan']").hide();
$(this).find("input[class~='editor-pendidikan']").fadeIn().focus();
$(this).find("span[class~='caption-pekerjaan']").hide();
$(this).find("input[class~='editor-pekerjaan']").fadeIn().focus();
$(this).find("span[class~='caption-penelitian']").hide();
$(this).find("input[class~='editor-penelitian']").fadeIn().focus();
$(this).find("span[class~='caption-pengabdian']").hide();
$(this).find("input[class~='editor-pengabdian']").fadeIn().focus();
$(this).find("span[class~='caption-publikasi']").hide();
$(this).find("input[class~='editor-publikasi']").fadeIn().focus();
});

$(document).on("keydown",".editor-pendidikan",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idpendidikan:id,valuependidikan:value};
if(target.is(".field-pendidikan-tingkat")){
data.modulpendidikan="tingkat";
}else if(target.is(".field-pendidikan-nama_pt")){
data.modulpendidikan="nama_pt";
}else if(target.is(".field-pendidikan-bidang_ilmu")){
data.modulpendidikan="bidang_ilmu";
}else if(target.is(".field-pendidikan-tahun_masuk")){
data.modulpendidikan="tahun_masuk";
}else if(target.is(".field-pendidikan-tahun_lulus")){
data.modulpendidikan="tahun_lulus";
}else if(target.is(".field-pendidikan-judul_ta")){
data.modulpendidikan="judul_ta";
}else if(target.is(".field-pendidikan-pembimbing")){
data.modulpendidikan="pembimbing";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatependidikanlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-pendidikan']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-pekerjaan",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idpekerjaan:id,valuepekerjaan:value};
if(target.is(".field-pekerjaan-jabatan")){
data.modulpekerjaan="jabatan";
}else if(target.is(".field-pekerjaan-tahun_mulai")){
data.modulpekerjaan="tahun_mulai";
}else if(target.is(".field-pekerjaan-tahun_selesai")){
data.modulpekerjaan="tahun_selesai";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatepekerjaanlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-pekerjaan']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-penelitian",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idpenelitian:id,valuepenelitian:value};
if(target.is(".field-penelitian-judul")){
data.modulpenelitian="judul";
}else if(target.is(".field-penelitian-tahun_mulai")){
data.modulpenelitian="tahun_mulai";
}else if(target.is(".field-penelitian-tahun_selesai")){
data.modulpenelitian="tahun_selesai";
}else if(target.is(".field-penelitian-sumber_dana")){
data.modulpenelitian="sumber_dana";
}else if(target.is(".field-penelitian-jumlah_dana")){
data.modulpenelitian="jumlah_dana";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatepenelitianlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-penelitian']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-pengabdian",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idpengabdian:id,valuepengabdian:value};
if(target.is(".field-pengabdian-judul")){
data.modulpengabdian="judul";
}else if(target.is(".field-pengabdian-tahun_mulai")){
data.modulpengabdian="tahun_mulai";
}else if(target.is(".field-pengabdian-tahun_selesai")){
data.modulpengabdian="tahun_selesai";
}else if(target.is(".field-pengabdian-sumber_dana")){
data.modulpengabdian="sumber_dana";
}else if(target.is(".field-pengabdian-jumlah_dana")){
data.modulpengabdian="jumlah_dana";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatepengabdianlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-pengabdian']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-publikasi",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idpublikasi:id,valuepublikasi:value};
if(target.is(".field-publikasi-tahun")){
data.modulpublikasi="tahun";
}else if(target.is(".field-publikasi-judul")){
data.modulpublikasi="judul";
}else if(target.is(".field-publikasi-nomor_jurnal")){
data.modulpublikasi="nomor_jurnal";
}else if(target.is(".field-publikasi-nama_jurnal")){
data.modulpublikasi="nama_jurnal";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatepublikasilive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-publikasi']").html(value).fadeIn();
}

});
//end
});

</script>
