<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <h4><img src="<?= base_url() . $identitas->foto?>" width="100px" height="120px" class="img-circle">&nbsp;&nbsp;Identitas Diri</h4>
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
                <th>Jabatan</th>
                <th>Masa Jabatan</th>
                <th>Pilihan</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($pekerjaan)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
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

<div class="panel panel-default" id="penelitian">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-tint"></i>&nbsp;&nbsp;Pengalaman Penelitian</h4>
    </div>

    <table class="table">
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
                <th>Jumlah (Juta Rupiah)</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i=0;
                if(empty($penelitian)) echo '<tr><td colspan="6"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                foreach($penelitian as $item):
            ?>
                    <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td>
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
            ?>
        </tbody>
    </table>
</div>

<div class="panel panel-default" id="pengabdian">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-leaf"></i>&nbsp;&nbsp;Pengalaman Pengabdian Kepada Masyarakat</h4>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align:middle;">No.</th>
                <th rowspan="2" style="vertical-align:middle;">Tahun</th>
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
                    <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td>
                        <td>
                        <div class="btn-group">
                          <a href="<?= site_url(); ?>home/mydocuments?sd=pengabdian&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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

<div class="panel panel-default" id="jurnal">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Pengalaman Penulisan Artikel Ilmiah dalam Jurnal</h4>
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
                    <tr><td><?= ++$i ?></td><td><?= $item->tahun ?></td><td><?= $item->judul ?></td><td><?= $item->nomor_jurnal ?></td><td><?= $item->nama_jurnal ?></td><td>
                        <div class="btn-group">
                          <a href="<?= site_url(); ?>home/mydocuments?sd=publikasi&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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

<div class="panel panel-default" id="seminar">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-share"></i>&nbsp;&nbsp;Pemakalah Seminar</h4>
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
                          <a href="<?= site_url(); ?>home/mydocuments?sd=seminar&id=<?= $item->id; ?>" type="button" class="btn btn-default btn-flat">Buka direktori</a>
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
