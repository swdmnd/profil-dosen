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
            <h4><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;1. Identitas Diri</h4>
        </div>

        <div class="panel-body">
                <p>Nama Lengkap (dengan gelar) : <?= $identitas->nama_lengkap ?> <br>
                Jabatan fungsional : <?= $identitas->jabatan_fungsional ?> <br>
                Jabatan struktural : <?= $identitas->jabatan_struktural ?> <br>
                NIP/NIK/No. Identitas lain : <?= $identitas->no_induk ?>
                NIDN : <?= $identitas->nidn ?> <br>
                Tempat lahir : <?= $identitas->tempat_lahir ?> <br>
                Tanggal lahir : <?= datetostr($identitas->tanggal_lahir) ?> <br>
                Alamat rumah : <?= $identitas->alamat_rumah ?><br>
                Nomor telepon : <?= $identitas->kontak_rumah ?><br>
                Nomor HP : <?= $identitas->kontak_hp ?> <br>
                Alamat kantor : <?= $identitas->alamat_kantor ?> <br>
                Nomor telepon : <?= $identitas->kontak_kantor ?> <br>
                Alamat e-mail : <?= $identitas->email ?> <br>
                Lulusan yang telah dihasilkan <br></p>
        </div>
    </div>

    <?php if(!empty($pendidikan)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;2. Riwayat Pendidikan</h4>
        </div>

        <table class="table" border="1">
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
    <?php endif; ?>

    <?php if(!empty($penelitian)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-tint"></i>&nbsp;&nbsp;3. Pengalaman Penelitian</h4>
        </div>

        <table class="table" border="1">
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
    <?php endif; ?>

    <?php if(!empty($pengabdian)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-leaf"></i>&nbsp;&nbsp;4. Pengalaman Pengabdian Kepada Masyarakat</h4>
        </div>

        <table class="table" border="1">
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
    <?php endif; ?>

    <?php if(!empty($publikasi)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;5. Pengalaman Penulisan Artikel Ilmiah dalam Jurnal</h4>
        </div>

        <table class="table" border="1">
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
    <?php endif; ?>

    <?php if(!empty($seminar)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-share"></i>&nbsp;&nbsp;6. Pemakalah Seminar</h4>
        </div>

        <table class="table" border="1">
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
    <?php endif; ?>
</div>
<!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
