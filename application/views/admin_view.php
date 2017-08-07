<div class="panel panel-default" id="identitas">
    <div class="panel-heading">
        <h4><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Akun</h4>
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
        
        <?= form_open(site_url()."/admin/save/account", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="no_induk" class="col-sm-2 control-label">NIK (Username)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="NIK sebagai username" />
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama tampilan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Tampilan" />
                </div>
            </div>
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama lengkap dengan gelar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap dengan gelar" />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                </div>
            </div>
            <div class="form-group">
                <label for="password_retype" class="col-sm-2 control-label">Ulangi password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_retype" name="password_retype" placeholder="Ulangi password" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="save" value="Tambah">
                </div>
            </div>
        <?= form_close(); ?>
      
        <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIK (Username)</th>
                <th>Nama</th>
                <th>Nama Lengkap</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; foreach($users as $u): ?>
              <tr>
                <td><?= ++$i ?></td>
                <td><?= $u->no_induk ?></td>
                <td><?= $u->nama ?></td>
                <td><?= $u->nama_lengkap ?></td>
                <td></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
var table = $(".table").DataTable();
  
table.on( 'draw', function () {
  var body = $( table.table().body() );

  body.unhighlight({ element: 'b'});
  body.highlight( table.search(), { element: 'b'} );  
});
</script>