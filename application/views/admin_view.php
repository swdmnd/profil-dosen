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
                    <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="NIK sebagai username" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama tampilan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Tampilan" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama lengkap dengan gelar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap dengan gelar" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="password_retype" class="col-sm-2 control-label">Ulangi password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_retype" name="password_retype" placeholder="Ulangi password" required/>
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
                <td class="nik"><?= $u->no_induk ?></td>
                <td class="nama"><?= $u->nama ?></td>
                <td class="nama_lengkap"><?= $u->nama_lengkap ?></td>
                <td>
                  <a href="#" type="button" class="btn btn-default btn-flat btn-edit btn-xs" data-id="<?= $u->uid ?>">Edit</a>
                  <a href="#" type="button" class="btn btn-default btn-flat btn-hapus btn-xs" data-id="<?= $u->uid ?>">Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Akun</h4>
      </div>
      <div class="modal-body">
        <div class="alert" id="editAlert">Error!</div>
        <form class="form-horizontal">
        <input type="hidden" class="form-control" id="editId" name="id">
          <div class="form-group">
              <label for="no_induk" class="col-sm-3 control-label">NIK (Username)</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" id="editNIK" name="no_induk" placeholder="NIK sebagai username" />
              </div>
          </div>
          <div class="form-group">
              <label for="nama" class="col-sm-3 control-label">Nama tampilan</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" id="editNama" name="nama" placeholder="Nama Tampilan" />
              </div>
          </div>
          <div class="form-group">
              <label for="nama_lengkap" class="col-sm-3 control-label">Nama lengkap dengan gelar</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" id="editNamaLengkap" name="nama_lengkap" placeholder="Nama lengkap dengan gelar" />
              </div>
          </div>
          <br>
          <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-8">
                  <input type="password" class="form-control" id="editPassword" name="password" placeholder="Kosongkan jika tidak ingin diubah" />
              </div>
          </div>
          <div class="form-group">
              <label for="password_retype" class="col-sm-3 control-label">Ulangi password</label>
              <div class="col-sm-8">
                  <input type="password" class="form-control" id="editPasswordRetype" name="password_retype" placeholder="Ulangi password" />
              </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <a href="#" class="btn btn-default btn-submit" role="button">Ubah</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh fa-spin" id="loading-ani"></i>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="hapusModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Anggota</h4>
      </div>
      <div class="modal-body">
        <p>Anda yakin?</p>
      </div>
      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-default" id="confirmLink">Ya</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>

  </div>
</div>

<script>
var table = $(".table").DataTable();
  
table.on( 'draw', function () {
  var body = $( table.table().body() );

  body.unhighlight({ element: 'b'});
  body.highlight( table.search(), { element: 'b'} );  
});
  
function disableModalForms(state){
  $("#editId").prop("disabled", state);
  $("#editNama").prop("disabled", state);
  $("#editNamaLengkap").prop("disabled", state);
  $("#editNIK").prop("disabled", state);
  $("#editPassword").prop("disabled", state);
  $("#editPasswordRetype").prop("disabled", state);
}
$(".btn-edit").click(function(){
  disableModalForms(false);
  
  var nama = $(this).parent().parent().find(".nama").text();
  var nama_lengkap = $(this).parent().parent().find(".nama_lengkap").text();
  var nik = $(this).parent().parent().find(".nik").text();
  
  $("#editId").val($(this).attr("data-id"));
  $("#editNama").val(nama);
  $("#editNamaLengkap").val(nama_lengkap);
  $("#editNIK").val(nik);
  
  $("#loading-ani").css("color", "white");
  $("#editAlert").css("display", "none");
  $("#editModal").modal();
});

$(".btn-submit").click(function(){
  $.ajax({
    url:'<?= site_url() ?>/admin/update/'+$("#editId").val(),
    type: "POST",
    data: {"password":$("#editPassword").val(),"nik":$("#editNIK").val(),"nama":$("#editNama").val(),"nama_lengkap":$("#editNamaLengkap").val(),"password_retype":$("#editPasswordRetype").val()},
    dataType: "json",
//    dataFilter: function(data){
//      console.log(data);
//      alert(data);
//      return {"status": "error", "msg":"asu"};
//    },
    success: function(data){
      if(data.status == "error"){
        $("#editAlert").attr("class", "alert alert-danger");
      } else {
        $("#editAlert").attr("class", "alert alert-success");
        data.msg = data.msg + " Melakukan refresh halaman...";
        setTimeout(function(){location.reload(1);}, 1000);
      }
      $("#editAlert").text(data.msg);
    },
    error: function(xhr, status, errorThrown){
      $("#editAlert").attr("class", "alert alert-danger");
      $("#editAlert").text("Gagal menghubungi server. Silahkan cek koneksi Anda."+errorThrown);
    },
    complete: function(){
      disableModalForms(false);
      $("#editAlert").css("display", "block");
      $("#loading-ani").css("color", "white");
    },
    beforeSend: function(){
      disableModalForms(true);
      $("#editAlert").css("display", "none");
      $("#loading-ani").css("color", "black");
    },
    
  });
});
  
$(".btn-hapus").click(function(){
  $("#confirmLink").attr("href", "<?= site_url()."/admin/delete/" ?>" + $(this).attr("data-id"));
  $("#hapusModal").modal();
});
</script>