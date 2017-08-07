<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Profil</h4>
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
        <?php
            if($this->session->flashdata("success")):
        ?>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata("success") ?></div>
        <?php
            endif;
        ?>
        
        <?= form_open_multipart(site_url()."/settings/save/profile", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">NIP/NIK/No. Identitas lain (Username)</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= $identitas->no_induk ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Tampilan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Tampilan" value="<?= $identitas->nama ?>">
                </div>
            </div>
            <?php if($this->session->userdata('login')->level != 'admin') : ?>
            <div class="form-group">
                <label for="kontak_rumah" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                    <div class="form-group col-md-12">
                        <img src="<?=site_url()?>/getfile/profileImage/" class="img-responsive image" alt="Foto"/>
                        <input type="file" class="form-control" id="fotoField" name="foto" style="margin-top: 4px;" />
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Simpan">
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Password</h4>
    </div>
  
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure_pass")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure_pass") ?></div>
        <?php
            endif;
        ?>
        <?php
            if($this->session->flashdata("success_pass")):
        ?>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata("success_pass") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/settings/save/password", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="old" class="col-sm-2 control-label">Password Lama</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="old" name="old" placeholder="Password Lama" />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" />
                </div>
            </div>
            <div class="form-group">
                <label for="password_retype" class="col-sm-2 control-label">Ulangi Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_retype" name="password_retype" placeholder="Password Baru Ulangi" />
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