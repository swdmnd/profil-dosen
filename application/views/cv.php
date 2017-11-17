<link rel="<?= base_url(); ?>assets/css/bootstrap-tagsinput.css">

<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <!--<h4><img src="<?= base_url() . $identitas->foto?>" width="100px" height="120px" class="img-circle"><br><br>Identitas Diri</h4>-->
        <h4><img src="<?= site_url(); ?>/getfile/profileImage/true" width="100px" height="120px"><br><br>Identitas Diri</h4>

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
            <div class="form-group">
                <label for="gelar_akademik" class="col-sm-2 control-label">Gelar Akademik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="gelar_akademik" name="gelar_akademik" placeholder="Magister,Kandidat Doktor,Doktor,Profesor" value="<?= $identitas->gelar_akademik ?>">
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
                    <input type="text" class="form-control" id="mk_diampu" name="mk_diampu" placeholder="Pisahkan dengan koma" value="<?= $identitas->mk_diampu ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="research_interests" class="col-sm-2 control-label">Research Interest</label>
                <div class="col-sm-10" style="margin-top:5px">
                    <input type="text" class="form-control" id="research_interests" name="research_interests" placeholder="Pisahkan dengan koma" value="<?= $identitas->research_interests ?>">
				</div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Pilih Foto</label>
                <div class="col-sm-10" style="margin-top:5px">
                        <input type="file" name="foto" />
				</div>
            </div>
            <div class="form-group">
                <label for="scopus_id" class="col-sm-2 control-label">Scopus ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="scopus_id" name="scopus_id" placeholder="Scopus ID" value="<?= $identitas->scopus_id ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="scholar_id" class="col-sm-2 control-label">Scholar ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="scholar_id" name="scholar_id" placeholder="Scholar ID" value="<?= $identitas->scholar_id ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="sinta_id" class="col-sm-2 control-label">Sinta ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="sinta_id" name="sinta_id" placeholder="Sinta ID" value="<?= $identitas->sinta_id ?>">
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
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->tingkat as $item => $value):
                ?>
                            <th><span class='span-pendidikan-tingkat caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tingkat'] ?></span> <input style='display: none; type='text' class='field-pendidikan-tingkat form-control editor-pendidikan' value='<?= $value['tingkat'] ?>' data-id='<?= $value['id'] ?>' /></th>
                <?php
                    endforeach;
                }
                ?>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th>Nama PT</th>
                <?php
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->nama_pt as $item => $value):
                ?>
                            <td><span class='span-pendidikan-nama_pt caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['nama_pt'] ?></span> <input style='display: none; type='text' class='field-pendidikan-nama_pt form-control editor-pendidikan' value='<?= $value['nama_pt'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                }
                ?>
            </tr>
            <tr>
                <th>Bidang Ilmu</th>
                <?php
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->bidang_ilmu as $item => $value):
                ?>
                            <td><span class='span-pendidikan-bidang_ilmu caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['bidang_ilmu'] ?></span> <input style='display: none; type='text' class='field-pendidikan-bidang_ilmu form-control editor-pendidikan' value='<?= $value['bidang_ilmu'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                }
                ?>
            </tr>
            <tr>
                <th>Tahun Masuk</th>
                <?php
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->tahun_masuk as $item => $value):
                ?>
                            <td><span class='span-pendidikan-tahun_masuk caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tahun_masuk'] ?></span> <input style='display: none; type='text' class='field-pendidikan-tahun_masuk form-control editor-pendidikan' value='<?= $value['tahun_masuk'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                }
                ?>
            </tr>
            <tr>
                <th>Tahun Lulus</th>
                <?php
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->tahun_lulus as $item => $value):
                ?>
                            <td><span class='span-pendidikan-tahun_lulus caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tahun_lulus'] ?></span> <input style='display: none; type='text' class='field-pendidikan-tahun_lulus form-control editor-pendidikan' value='<?= $value['tahun_lulus'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                }
                ?>
            </tr>
            <tr>
                <th>Judul Tugas Akhir</th>
                <?php
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->judul_ta as $item => $value):
                ?>
                            <td><span class='span-pendidikan-judul_ta caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['judul_ta'] ?></span> <input style='display: none; type='text' class='field-pendidikan-judul_ta form-control editor-pendidikan' value='<?= $value['judul_ta'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                }
                ?>
            </tr>
            <tr>
                <th>Nama Pembimbing/Promotor</th>
                <?php
                if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
                else{
                    foreach($pendidikan->pembimbing as $item => $value):
                ?>
                            <td><span class='span-pendidikan-pembimbing caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['pembimbing'] ?></span> <input style='display: none; type='text' class='field-pendidikan-pembimbing form-control editor-pendidikan' value='<?= $value['pembimbing'] ?>' data-id='<?= $value['id'] ?>' /></td>
                <?php
                    endforeach;
                }
                ?>
            </tr>
            <tr>
              <th>Aksi</th>
              <?php
              if(empty($pendidikan)){echo '<th><center>Kosong</h2></th>';}
              else{
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
              }
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
                $i=1;
                if(empty($pekerjaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($pekerjaan as $item):
            ?>

                    <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-pekerjaan-tahun_mulai caption-pekerjaan' data-id='<?= $item->id ?>'><?= $item->tahun_mulai ?></span> <input style="display: none;" type='text' class='field-pekerjaan-tahun_mulai form-control editor-pekerjaan' value='<?= $item->tahun_mulai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pekerjaan-tahun_selesai caption-pekerjaan' data-id='<?= $item->id ?>'><?= $item->tahun_selesai ?></span> <input style="display: none;" type='text' class='field-pekerjaan-tahun_selesai form-control editor-pekerjaan' value='<?= $item->tahun_selesai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pekerjaan-jabatan caption-pekerjaan' data-id='<?= $item->id ?>'><?= $item->jabatan ?></span> <input style='display: none; type='text' class='field-pekerjaan-jabatan form-control editor-pekerjaan' value='<?= $item->jabatan ?>' data-id='<?= $item->id ?>' /></td>
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
        <h4><i class="glyphicon glyphicon-tint"></i>&nbsp;&nbsp;Penelitian</h4>
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
                <label for="jumlah_dana" class="col-sm-2 control-label">Jumlah Pendanaan (Rupiah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control nominal" id="jumlah_dana" name="jumlah_dana" placeholder="" required>
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
                <th>Jumlah (Rupiah)</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($penelitian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($penelitian as $item):

            ?>
                    <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-penelitian-tahun_mulai caption-penelitian' data-id='<?= $item->id ?>'><?= $item->tahun_mulai ?></span> <input style="display: none;" type='text' class='field-penelitian-tahun_mulai form-control editor-penelitian' value='<?= $item->tahun_mulai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-tahun_selesai caption-penelitian' data-id='<?= $item->id ?>'><?= $item->tahun_selesai ?></span> <input style="display: none;" type='text' class='field-penelitian-tahun_selesai form-control editor-penelitian' value='<?= $item->tahun_selesai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-judul caption-penelitian' data-id='<?= $item->id ?>'><?= $item->judul ?></span> <input style='display: none; type='text' class='field-penelitian-judul form-control editor-penelitian' value='<?= $item->judul ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-sumber_dana caption-penelitian' data-id='<?= $item->id ?>'><?= $item->sumber_dana ?></span> <input style='display: none; type='text' class='field-penelitian-sumber_dana form-control editor-penelitian' value='<?= $item->sumber_dana ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penelitian-jumlah_dana caption-penelitian' data-id='<?= $item->id ?>'><?= $item->jumlah_dana ?></span> <input style='display: none; type='text' class='field-penelitian-jumlah_dana form-control editor-penelitian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td>
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
        <h4><i class="glyphicon glyphicon-leaf"></i>&nbsp;&nbsp;Pengabdian Masyarakat</h4>
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
                <label for="jumlah_dana" class="col-sm-2 control-label">Jumlah Pendanaan (Rupiah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control nominal" id="jumlah_dana" name="jumlah_dana" placeholder="" required>
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
                <th>Jumlah (Rupiah)</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($pengabdian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($pengabdian as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-pengabdian-tahun_mulai caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->tahun_mulai ?></span> <input style="display: none;" type='text' class='field-pengabdian-tahun_mulai form-control editor-pengabdian' value='<?= $item->tahun_mulai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-tahun_selesai caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->tahun_selesai ?></span> <input style="display: none;" type='text' class='field-pengabdian-tahun_selesai form-control editor-pengabdian' value='<?= $item->tahun_selesai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-judul caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->judul ?></span> <input style='display: none; type='text' class='field-pengabdian-judul form-control editor-pengabdian' value='<?= $item->judul ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-sumber_dana caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->sumber_dana ?></span> <input style='display: none; type='text' class='field-pengabdian-jumlah_dana form-control editor-pengabdian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-pengabdian-jumlah_dana caption-pengabdian' data-id='<?= $item->id ?>'><?= $item->jumlah_dana ?></span> <input style='display: none; type='text' class='field-pengabdian-jumlah_dana form-control editor-pengabdian' value='<?= $item->jumlah_dana ?>' data-id='<?= $item->id ?>' /></td>
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
        <h4><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Publikasi Ilmiah</h4>
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
                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="2017, Januari" required>
                </div>
            </div>
            <div class="form-group">
                <label for="penulis" class="col-sm-2 control-label">Penulis Publikasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis publikasi" required>
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
                <th>Penulis</th>
                <th>Judul Artikel Ilmiah</th>
                <th>Volume/Nomor</th>
                <th>Nama Jurnal</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($publikasi)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($publikasi as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-publikasi-tahun caption-publikasi' data-id='<?= $item->id ?>'><?= $item->tahun ?></span> <input style="display: none;" type='text' class='field-publikasi-tahun form-control editor-publikasi' value='<?= $item->tahun ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-penulis caption-publikasi' data-id='<?= $item->id ?>'><?= $item->penulis ?></span> <input style="display: none;" type='text' class='field-publikasi-penulis form-control editor-publikasi' value='<?= $item->penulis ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-judul caption-publikasi' data-id='<?= $item->id ?>'><?= $item->judul ?></span> <input style="display: none;" type='text' class='field-publikasi-judul form-control editor-publikasi' value='<?= $item->judul ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-nomor_jurnal caption-publikasi' data-id='<?= $item->id ?>'><?= $item->nomor_jurnal ?></span> <input style='display: none; type='text' class='field-publikasi-nomor_jurnal form-control editor-publikasi' value='<?= $item->nomor_jurnal ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-publikasi-nama_jurnal caption-publikasi' data-id='<?= $item->id ?>'><?= $item->nama_jurnal ?></span> <input style='display: none; type='text' class='field-publikasi-nama_jurnal form-control editor-publikasi' value='<?= $item->nama_jurnal ?>' data-id='<?= $item->id ?>' /></td>
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

<div class="panel panel-default" id="bukuteks">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-book"></i>&nbsp;&nbsp;Buku Teks</h4>
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
        <?= form_open(site_url()."/home/save/buku_teks", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="tahun_terbit" class="col-sm-2 control-label">Tahun terbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun terbit" required>
                </div>
            </div>
            <div class="form-group">
                <label for="penulis" class="col-sm-2 control-label">Penulis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis Buku Teks" required>
                </div>
            </div>
            <div class="form-group">
                <label for="judul_buku" class="col-sm-2 control-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku Teks" required>
                </div>
            </div>
            <div class="form-group">
                <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku Teks" required>
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
                <th>Tahun terbit</th>
                <th>Penulis</th>
                <th>Judul Buku</th>
                <th>Penerbit</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($buku_teks)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($buku_teks as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-bukuteks-tahun_terbit caption-bukuteks' data-id='<?= $item->id ?>'><?= $item->tahun_terbit ?></span> <input style="display: none;" type='text' class='field-bukuteks-tahun_terbit form-control editor-bukuteks' value='<?= $item->tahun_terbit ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-bukuteks-penulis caption-bukuteks' data-id='<?= $item->id ?>'><?= $item->penulis ?></span> <input style="display: none;" type='text' class='field-bukuteks-penulis form-control editor-bukuteks' value='<?= $item->penulis ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-bukuteks-judul_buku caption-bukuteks' data-id='<?= $item->id ?>'><?= $item->judul_buku ?></span> <input style='display: none; type='text' class='field-bukuteks-judul_buku form-control editor-bukuteks' value='<?= $item->judul_buku ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-bukuteks-penerbit caption-bukuteks' data-id='<?= $item->id ?>'><?= $item->penerbit ?></span> <input style='display: none; type='text' class='field-bukuteks-penerbit form-control editor-bukuteks' value='<?= $item->penerbit ?>' data-id='<?= $item->id ?>' /></td><td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href='#'>Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=buku_teks&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deletebukuteks/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
                          </ul>
                        </div>
                        </td></tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>

<div class="panel panel-default" id="penghargaan">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-bookmark"></i>&nbsp;&nbsp;Penghargaan</h4>
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
        <?= form_open(site_url()."/home/save/penghargaan", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="tahun_penghargaan" class="col-sm-2 control-label">Tahun penghargaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_penghargaan" name="tahun_penghargaan" placeholder="Tahun Penghargaan" required>
                </div>
            </div>
            <div class="form-group">
                <label for="sebagai" class="col-sm-2 control-label">Sebagai</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sebagai" name="sebagai" placeholder="Sebagai" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_penghargaan" class="col-sm-2 control-label">Nama Penghargaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_penghargaan" name="nama_penghargaan" placeholder="Nama Penghargaan" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pemberi_penghargaan" class="col-sm-2 control-label">Pemberi Penghargaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pemberi_penghargaan" name="pemberi_penghargaan" placeholder="Pemberi Penghargaan" required>
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
                <th>Tahun penghargaan</th>
                <th>Sebagai</th>
                <th>Nama penghargaan</th>
                <th>Pemberi penghargaan</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($penghargaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($penghargaan as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-penghargaan-tahun_penghargaan caption-penghargaan' data-id='<?= $item->id ?>'><?= $item->tahun_penghargaan ?></span> <input style="display: none;" type='text' class='field-penghargaan-tahun_penghargaan form-control editor-penghargaan' value='<?= $item->tahun_penghargaan ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penghargaan-sebagai caption-penghargaan' data-id='<?= $item->id ?>'><?= $item->sebagai ?></span> <input style="display: none;" type='text' class='field-penghargaan-sebagai form-control editor-penghargaan' value='<?= $item->sebagai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penghargaan-nama_penghargaan caption-penghargaan' data-id='<?= $item->id ?>'><?= $item->nama_penghargaan ?></span> <input style="display: none;" type='text' class='field-penghargaan-nama_penghargaan form-control editor-penghargaan' value='<?= $item->nama_penghargaan ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-penghargaan-pemberi_penghargaan caption-penghargaan' data-id='<?= $item->id ?>'><?= $item->pemberi_penghargaan ?></span> <input style='display: none; type='text' class='field-penghargaan-pemberi_penghargaan form-control editor-penghargaan' value='<?= $item->pemberi_penghargaan ?>' data-id='<?= $item->id ?>' /></td><td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href='#'>Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=penghargaan&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deletepenghargaan/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
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
        <h4><i class="glyphicon glyphicon-share"></i>&nbsp;&nbsp;Nara Sumber</h4>
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
            <label for="sebagai" class="col-sm-2 control-label">Sebagai</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sebagai" name="sebagai" placeholder="Sebagai" required>
            </div>
          </div>
            <div class="form-group">
                <label for="nama_seminar" class="col-sm-2 control-label">Nama Seminar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_seminar" name="nama_seminar" placeholder="Nama Seminar" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tema" class="col-sm-2 control-label">Tema Seminar</label>
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
                <th>Sebagai</th>
                <th>Nama Pertemuan Ilmiah/Seminar</th>
                <th>Tema Pertemuan Ilmiah</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($seminar)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($seminar as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-seminar-sebagai caption-seminar' data-id='<?= $item->id ?>'><?= $item->sebagai ?></span> <input style="display: none;" type='text' class='field-seminar-sebagai form-control editor-seminar' value='<?= $item->sebagai ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-seminar-nama_seminar caption-seminar' data-id='<?= $item->id ?>'><?= $item->nama_seminar ?></span> <input style="display: none;" type='text' class='field-seminar-nama_seminar form-control editor-seminar' value='<?= $item->nama_seminar ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-seminar-tema caption-seminar' data-id='<?= $item->id ?>'><?= $item->tema ?></span> <input style="display: none;" type='text' class='field-seminar-tema form-control editor-seminar' value='<?= $item->tema ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-seminar-waktu caption-seminar' data-id='<?= $item->id ?>'><?= $item->waktu ?></span> <input style='display: none; type='text' class='field-seminar-waktu form-control editor-seminar' value='<?= $item->waktu ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-seminar-tempat caption-seminar' data-id='<?= $item->id ?>'><?= $item->tempat ?></span> <input style='display: none; type='text' class='field-seminar-tempat form-control editor-seminar' value='<?= $item->tempat ?>' data-id='<?= $item->id ?>' /></td><td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href='#'>Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=seminar&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deleteseminar/<?= $item->id ?>/<?= $identitas->uid ?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
                          </ul>
                        </div>
                        </td></tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>

<div class="panel panel-default" id="kuliah">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-share"></i>&nbsp;&nbsp;Kuliah</h4>
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
        <?= form_open_multipart(site_url()."/home/save/kuliah", 'class="form-horizontal"'); ?>
          <div class="form-group">
            <label for="nama_mk" class="col-sm-2 control-label">Nama Mata Kuliah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" placeholder="Nama Mata Kuliah" required>
            </div>
          </div>
            <div class="form-group">
                <label for="kode_mk" class="col-sm-2 control-label">Kode Mata Kuliah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode_mk" name="kode_mk" placeholder="Kode Mata Kuliah" required>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi_mk" class="col-sm-2 control-label">Deskripsi Mata Kuliah</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi_mk" name="deskripsi_mk" placeholder="Deskripsi Mata Kuliah"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="sks_mk" class="col-sm-2 control-label">SKS Mata Kuliah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sks_mk" name="sks_mk" placeholder="SKS Mata Kuliah" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pengampu_mk" class="col-sm-2 control-label">Pengampu Mata Kuliah</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="pengampu_mk" name="pengampu_mk" placeholder="Pengampu Mata Kuliah" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="rps_mk" class="col-sm-2 control-label">Upload RPS Mata Kuliah</label>
                <div class="col-sm-10" style="margin-top:5px">
                        <input type="file" name="rps_mk" />
				        </div>
            </div>
            <div class="form-group">
                <label for="kontrak_mk" class="col-sm-2 control-label">Upload Kontrak Mata Kuliah</label>
                <div class="col-sm-10" style="margin-top:5px">
                        <input type="file" name="kontrak_mk" />
				        </div>
            </div>
            <div class="form-group">
                <label for="silabus_mk" class="col-sm-2 control-label">Upload Silabus Mata Kuliah</label>
                <div class="col-sm-10" style="margin-top:5px">
                        <input type="file" name="silabus_mk" />
				        </div>
            </div>
            <div class="form-group">
                <label for="link_kulon" class="col-sm-2 control-label">Link Kulon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="link_kulon" name="link_kulon" placeholder="http://kulon.undip.ac.id/course/view.php?id=149">
                </div>
            </div>
            <div class="form-group">
                <label for="link_drive" class="col-sm-2 control-label">Link Drive</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="link_drive" name="link_drive" placeholder="https://drive.google.com/drive/u/0/folders/0B_AqBxcy3qx1WExUZXVIbEhWOW8">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>
    </div>

    <table class="table" style="word-wrap:break-word;table-layout: fixed;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>SKS</th>
                <th>Pengampu</th>
                <th>Kulon</th>
                <th>Drive</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=1;
                if(empty($kuliah)) echo '<tr><td colspan="9"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($kuliah as $item):
            ?>
            <tr data-id="<?= $item->id ?>"><td><?= $i++ ?></td><td><span class='span-kuliah-nama_mk caption-kuliah' data-id='<?= $item->id ?>'><?= $item->nama_mk ?></span> <input style="display: none;" type='text' class='field-kuliah-sebagai form-control editor-kuliah' value='<?= $item->nama_mk ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-kuliah-kode_mk caption-kode_mk' data-id='<?= $item->id ?>'><?= $item->kode_mk ?></span> <input style="display: none;" type='text' class='field-kuliah-kode_mk form-control editor-kuliah' value='<?= $item->kode_mk ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-kuliah-deskripsi_mk caption-kuliah' data-id='<?= $item->id ?>'><?= $item->deskripsi_mk ?></span> <input style="display: none;" type='text' class='field-kuliah-deskripsi_mk form-control editor-kuliah' value='<?= $item->deskripsi_mk ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-kuliah-sks_mk caption-kuliah' data-id='<?= $item->id ?>'><?= $item->sks_mk ?></span> <input style='display: none; type='text' class='field-kuliah-sks_mk form-control editor-kuliah' value='<?= $item->sks_mk ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-kuliah-pengampu_mk caption-kuliah' data-id='<?= $item->id ?>'><?= $item->pengampu_mk ?></span> <input style='display: none; type='text' class='field-kuliah-pengampu_mk form-control editor-kuliah' value='<?= $item->pengampu_mk ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-kuliah-link_kulon caption-kuliah' data-id='<?= $item->id ?>'><?= $item->link_kulon ?></span> <input style='display: none; type='text' class='field-kuliah-link_kulon form-control editor-kuliah' value='<?= $item->link_kulon ?>' data-id='<?= $item->id ?>' /></td><td><span class='span-kuliah-link_drive caption-kuliah' data-id='<?= $item->id ?>'><?= $item->link_drive ?></span> <input style='display: none; type='text' class='field-kuliah-link_drive form-control editor-kuliah' value='<?= $item->link_drive ?>' data-id='<?= $item->id ?>' /></td><td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"><a href='#'>Action</a>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url(); ?>/home/mydocuments?sd=kuliah&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a></li>
                            <li><a href="<?= site_url() ?>/home/deletekuliah/<?= $item->id ?>/<?= $identitas->uid ?>/<?= $identitas->no_induk?>" type="button" class="btn btn-default btn-flat">Delete <span class="glyphicon glyphicon-trash"></span></a></li>
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
    $('#waktu').datepicker({
        autoclose: true,
        format: "d MM yyyy",
        language: "id"
    });
    $(".select2").select2();
    //$(".nominal").mask("#.##0", {reverse: true});

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
$(this).find("span[class~='caption-seminar']").hide();
$(this).find("input[class~='editor-seminar']").fadeIn().focus();
$(this).find("span[class~='caption-bukuteks']").hide();
$(this).find("input[class~='editor-bukuteks']").fadeIn().focus();
$(this).find("span[class~='caption-penghargaan']").hide();
$(this).find("input[class~='editor-penghargaan']").fadeIn().focus();
$(this).find("span[class~='caption-kuliah']").hide();
$(this).find("input[class~='editor-kuliah']").fadeIn().focus();
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
}else if(target.is(".field-publikasi-penulis")){
data.modulpublikasi="penulis";
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

$(document).on("keydown",".editor-seminar",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idseminar:id,valueseminar:value};
if(target.is(".field-seminar-sebagai")){
data.modulseminar="sebagai";
}else if(target.is(".field-seminar-nama_seminar")){
data.modulseminar="nama_seminar";
}else if(target.is(".field-seminar-tema")){
data.modulseminar="tema";
}else if(target.is(".field-seminar-tempat")){
data.modulseminar="tempat";
}else if(target.is(".field-seminar-waktu")){
data.modulseminar="waktu";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updateseminarlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-seminar']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-bukuteks",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idbukuteks:id,valuebukuteks:value};
if(target.is(".field-bukuteks-tahun_terbit")){
data.modulbukuteks="tahun_terbit";
}else if(target.is(".field-bukuteks-penulis")){
data.modulbukuteks="penulis";
}else if(target.is(".field-bukuteks-judul_buku")){
data.modulbukuteks="judul_buku";
}else if(target.is(".field-bukuteks-penerbit")){
data.modulbukuteks="penerbit";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatebukutekslive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-bukuteks']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-penghargaan",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idpenghargaan:id,valuepenghargaan:value};
if(target.is(".field-penghargaan-tahun_penghargaan")){
data.modulpenghargaan="tahun_penghargaan";
}else if(target.is(".field-penghargaan-sebagai")){
data.modulpenghargaan="sebagai";
}else if(target.is(".field-penghargaan-nama_penghargaan")){
data.modulpenghargaan="nama_penghargaan";
}else if(target.is(".field-penghargaan-pemberi_penghargaan")){
data.modulpenghargaan="pemberi_penghargaan";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatepenghargaanlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-penghargaan']").html(value).fadeIn();
}

});

$(document).on("keydown",".editor-kuliah",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={idkuliah:id,valuekuliah:value};
if(target.is(".field-kuliah-nama_mk")){
data.modulkuliah="nama_mk";
}else if(target.is(".field-kuliah-kode_mk")){
data.modulkuliah="kode_mk";
}else if(target.is(".field-kuliah-deskripsi_mk")){
data.modulkuliah="deskripsi_mk";
}else if(target.is(".field-kuliah-sks_mk")){
data.modulkuliah="sks_mk";
}else if(target.is(".field-kuliah-pengampu_mk")){
data.modulkuliah="pengampu_mk";
}else if(target.is(".field-kuliah-link_kulon")){
data.modulkuliah="link_kulon";
}else if(target.is(".field-kuliah-link_drive")){
data.modulkuliah="link_drive";
}
//alert(JSON.stringify(data));
$.ajax({
	data:data,
	url:"<?php echo site_url() . '/home/updatekuliahlive/' ?>",

})
target.hide();
target.siblings("span[class~='caption-kuliah']").html(value).fadeIn();
}

});

//end
});

</script>
