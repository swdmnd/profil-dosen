<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
    <style>
    <?php
      file_get_contents('C:\xampp\htdocs\manajemen_dosen\assets\css\bootstrap.min.css');
    ?>
  </style>
    <style>
    <?php
      file_get_contents('C:\xampp\htdocs\manajemen_dosen\assets\css\AdminLTE.min.css');
    ?>
  </style>
    <style>
    <?php
      file_get_contents('C:\xampp\htdocs\manajemen_dosen\assets\css\skins\skin-blue.min.css');
    ?>
  </style>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <div class="panel panel-default" action="notme">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Identitas Diri</h4>
        </div>

        <div class="panel-body">
                <div class="form-group">
                    <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap (dengan gelar)</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->nama_lengkap ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jabatan_fungsional" class="col-sm-2 control-label">Jabatan fungsional</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->jabatan_fungsional ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jabatan_struktural" class="col-sm-2 control-label">Jabatan struktural</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->jabatan_struktural ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_induk" class="col-sm-2 control-label">NIP/NIK/No. Identitas lain</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->no_induk ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nidn" class="col-sm-2 control-label">NIDN</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->nidn ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir" class="col-sm-2 control-label">Tempat lahir</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->tempat_lahir ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal lahir</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= datetostr($identitas->tanggal_lahir) ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat_rumah" class="col-sm-2 control-label">Alamat rumah</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->alamat_rumah ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kontak_rumah" class="col-sm-2 control-label">Nomor telepon</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->kontak_rumah ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kontak_hp" class="col-sm-2 control-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->kontak_hp ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat_kantor" class="col-sm-2 control-label">Alamat kantor</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->alamat_kantor ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kontak_kantor" class="col-sm-2 control-label">Nomor telepon</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->kontak_kantor ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Alamat e-mail</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->email ?></p>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Alamat e-mail" value="<?= $identitas->email ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="meluluskan" class="col-sm-2 control-label">Lulusan yang telah dihasilkan</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $identitas->meluluskan ?></p>
                    </div>
                </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;Riwayat Pendidikan</h4>
        </div>

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
    </div>

    <div class="panel panel-default">
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
                </tr>
                <tr>
                    <th>Sumber</th>
                    <th>Jumlah (Juta Rupiah)</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $i=0;
                    if(empty($penelitian)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                    foreach($penelitian as $item):
                ?>
                        <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td></tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
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
                </tr>
                <tr>
                    <th>Sumber</th>
                    <th>Jumlah (Juta Rupiah)</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $i=0;
                    if(empty($pengabdian)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                    foreach($pengabdian as $item):
                ?>
                        <tr><td><?= ++$i ?></td><td><?= $item->tahun_mulai==$item->tahun_selesai?$item->tahun_mulai:$item->tahun_mulai." - ".$item->tahun_selesai ?></td><td><?= $item->judul ?></td><td><?= $item->sumber_dana ?></td><td><?= $item->jumlah_dana ?></td></tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
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
                </tr>
            </thead>

            <tbody>
                <?php
                    $i=0;
                    if(empty($publikasi)) echo '<tr><td colspan="5"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
                    foreach($publikasi as $item):
                ?>
                        <tr><td><?= ++$i ?></td><td><?= $item->tahun ?></td><td><?= $item->judul ?></td><td><?= $item->nomor_jurnal ?></td><td><?= $item->nama_jurnal ?></td></tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
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
                </tr>
            </thead>

            <tbody>
                <?php
                    $i=0;
                    if(empty($seminar)) echo '<tr><td colspan="4"><h2 style="color:#ccc"><center>Kosong</h2></td></tr>';
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
<!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
