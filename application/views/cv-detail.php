<div class="panel panel-default" id="identitas">
    <div class="panel-heading">

        <!--<h4><img src="<?= base_url() . $identitas->foto?>" width="100px" height="120px" class="img-circle"><br><br>Identitas Diri</h4>-->
        <h4><img src="<?= site_url(); ?>/getfile/profileImage/true" width="100px" height="120px"><br><br>Identitas Diri</h4>

    </div>

    <div class="panel-body">

            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="nama_lengkap" class="control-label"><?= $identitas->nama_lengkap ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="prodi" class="col-sm-2 control-label">Program Studi</label>
                <div class="col-sm-10">
					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="prodi" class="control-label"><?= $identitas->prodi ?></label>
				</div>
            </div>
            <div class="form-group">
                <label for="deskripsi_singkat" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="deskripsi_singkat" class="control-label"><?= $identitas->deskripsi_singkat ?></label>
				</div>
            </div>
            <div class="form-group">
                <label for="jabatan_fungsional" class="col-sm-2 control-label">Jabatan fungsional</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="jabatan_fungsional" class="control-label"><?= $identitas->jabatan_fungsional ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="jabatan_struktural" class="col-sm-2 control-label">Jabatan struktural</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="jabatan_struktural" class="control-label"><?= $identitas->jabatan_struktural ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="gelar_akademik" class="col-sm-2 control-label">Gelar Akademik</label>
                <div class="col-sm-10">
                  <label style="text-align:left;font-weight:normal;margin-bottom:20px" for="gelar_akademik" class="control-label"><?= $identitas->gelar_akademik ?></label>
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
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="nidn" class="control-label"><?= $identitas->nidn ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="tempat_lahir" class="col-sm-2 control-label">Tempat lahir</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="tempat_lahir" class="control-label"><?= $identitas->tempat_lahir ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal lahir</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="tempat_lahir" class="control-label"><?= $identitas->tanggal_lahir ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_rumah" class="col-sm-2 control-label">Alamat rumah</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="alamat_rumah" class="control-label"><?= $identitas->alamat_rumah ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_kantor" class="col-sm-2 control-label">Alamat kantor</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="alamat_kantor" class="control-label"><?= $identitas->alamat_kantor ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="kontak_kantor" class="col-sm-2 control-label">Nomor telepon</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="kontak_kantor" class="control-label"><?= $identitas->kontak_kantor ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Alamat e-mail</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="email" class="control-label"><?= $identitas->email ?></label>
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
                    <label for="D3" class="col-sm-2 control-label">D3</label><div class="col-sm-10"><label style="text-align:left;font-weight:normal;margin-bottom:20px" for="D3" class="control-label"><?= $result['D3']?></label></div>
                    <label for="S1" class="col-sm-2 control-label">S1</label><div class="col-sm-10"><label style="text-align:left;font-weight:normal;margin-bottom:20px" for="S1" class="control-label"><?= $result['S1']?></label></div>
                    <label for="Profesi" class="col-sm-2 control-label">Profesi</label><div class="col-sm-10"><label style="text-align:left;font-weight:normal;margin-bottom:20px" for="Pr" class="control-label"><?= $result['Pr']?></label></div>
                    <label for="S2" class="col-sm-2 control-label">S2</label><div class="col-sm-10"><label style="text-align:left;font-weight:normal;margin-bottom:20px" for="S2" class="control-label"><?= $result['S2']?></label></div>
                    <label for="S3" class="col-sm-2 control-label">S3</label><div class="col-sm-10"><label style="text-align:left;font-weight:normal;margin-bottom:20px" for="S3" class="control-label"><?= $result['S3']?></label></div>
					<?php
					}
					?>
                </div>
            </div>
            <div class="form-group">
                <label for="mk_diampu" class="col-sm-2 control-label">Mata kuliah yang diampu</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="mk_diampu" class="control-label"><?= $identitas->mk_diampu ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="research_interests" class="col-sm-2 control-label">Research Interest</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="research_interests" class="control-label"><?= $identitas->research_interests ?></label>
				</div>
            </div>
            <div class="form-group">
                <label for="scopus_id" class="col-sm-2 control-label">Scopus ID</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="scopus_id" class="control-label"><?= $identitas->scopus_id ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="scholar_id" class="col-sm-2 control-label">Scholar ID</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="scholar_id" class="control-label"><?= $identitas->scholar_id ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="sinta_id" class="col-sm-2 control-label">Sinta ID</label>
                <div class="col-sm-10">
 					<label style="text-align:left;font-weight:normal;margin-bottom:20px" for="sinta_id" class="control-label"><?= $identitas->sinta_id ?></label>
                </div>
            </div>
    <br />
    </div>
</div>

<div class="panel panel-default" id="pendidikan">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;Riwayat Pendidikan</h4>
    </div>
	<?php if (isset($pendidikan->tingkat))
	{
	?>
   <table class="table">
        <thead>
            <tr>
                <th></th>
                <?php
                    foreach($pendidikan->tingkat as $item => $value):
                ?>
                            <th><span class='span-pendidikan-tingkat caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tingkat'] ?></span></th>
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
                            <td><span class='span-pendidikan-nama_pt caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['nama_pt'] ?></span></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Bidang Ilmu</th>
                <?php
                    foreach($pendidikan->bidang_ilmu as $item => $value):
                ?>
                            <td><span class='span-pendidikan-bidang_ilmu caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['bidang_ilmu'] ?></span></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Tahun Masuk</th>
                <?php
                    foreach($pendidikan->tahun_masuk as $item => $value):
                ?>
                            <td><span class='span-pendidikan-tahun_masuk caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tahun_masuk'] ?></span></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Tahun Lulus</th>
                <?php
                    foreach($pendidikan->tahun_lulus as $item => $value):
                ?>
                            <td><span class='span-pendidikan-tahun_lulus caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['tahun_lulus'] ?></span> </td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Judul Tugas Akhir</th>
                <?php
                    foreach($pendidikan->judul_ta as $item => $value):
                ?>
                            <td><span class='span-pendidikan-judul_ta caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['judul_ta'] ?></span></td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <th>Nama Pembimbing/Promotor</th>
                <?php
                    foreach($pendidikan->pembimbing as $item => $value):
                ?>
                            <td><span class='span-pendidikan-pembimbing caption-pendidikan' data-id='<?= $value['id'] ?>'><?= $value['pembimbing'] ?></span></td>
                <?php
                    endforeach;
                ?>
            </tr>
        </tbody>
    </table>
	<?php
	}
	?>
</div>

<div class="panel panel-default" id="pekerjaan">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-briefcase"></i>&nbsp;&nbsp;Riwayat Pekerjaan</h4>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tahun</th>
                <th>Jabatan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($pekerjaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($pekerjaan as $item):
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai ?> - <?= $item->tahun_selesai?></td><td><?= $item->jabatan?></td>
                    </tr>
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

    <table class="table">
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
                if(empty($penelitian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($penelitian as $item):
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td>
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

    <table class="table">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">Tahun</th>
                <th rowspan="2" style="vertical-align:middle;">Judul Pengabdian Kepada Masyarakat</th>
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
                if(empty($pengabdian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($pengabdian as $item):
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td>
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

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Publikasi</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($publikasi)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
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
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $publikasilengkap ?></td>
                    </tr>
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

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Buku Teks</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($buku_teks)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                $bukutekslengkap = '';
                foreach($buku_teks as $item):
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
                  $tahun_terbit = "(" . $item->tahun_terbit . ")";
                  $judul_buku = $item->judul_buku;
                  $penerbit = $item->penerbit;
                  $bukutekslengkap = $penulis . " . " . $tahun_terbit . " . " . $judul_buku . " . " . $penerbit . ".";
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $bukutekslengkap ?></td>
                    </tr>
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

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tahun penghargaan</th>
                <th>Sebagai</th>
                <th>Nama penghargaan</th>
                <th>Pemberi penghargaan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($penghargaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($penghargaan as $item):
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $item->sebagai ?></td><td><?= $item->tahun_penghargaan ?></td><td><?= $item->nama_penghargaan ?></td><td><?= $item->pemberi_penghargaan ?></td>
                    </tr>
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

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Sebagai</th>
                <th>Nama Pertemuan Ilmiah/Seminar</th>
                <th>Tema Pertemuan Ilmiah/Seminar</th>
                <th>Waktu dan Tempat</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($seminar)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($seminar as $item):
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $item->sebagai ?></td><td><?= $item->nama_seminar ?></td><td><?= $item->tema ?></td><td><?= $item->tempat.', '.$item->waktu ?></td></tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>
