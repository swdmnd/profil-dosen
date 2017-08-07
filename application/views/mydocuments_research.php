<div class="panel panel-info">
    <div class="panel-heading">
        <h4><a role="button" class="close" aria-label="Close" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span aria-hidden="true">&times;</span></a>Berkas <?= $this->input->get('sd') ?></h4>
    </div>
    
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata("update_success") ?></div>
        <?php
            endif;
        ?>
        <?= form_open(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"")."&update=1", 'class="form-horizontal onsubmit="$(".nominal").unmask();"'); ?>
        <?php foreach($research_data[0] as $key=>$value):
                if($key=="id" || $key=="tipe" || $key=="uid" || $key=="timestamp") continue;
        ?>
            <div class="form-group">
                <label for="dir_name" class="col-sm-2 control-label"><?= ucfirst(implode(" ", explode("_", $key))) ?></label>
                <div class="col-sm-10">
                  <?php if(isset($research_members)): if($research_members->ketua->id_ketua == $this->session->userdata('login')->uid): ?>
                    <?php if ($key == "jumlah_dana"): ?> <div class="input-group"><?php endif; ?>
                      <?php if ($key == "jumlah_dana"): ?><div class="input-group-addon">Rp</div><?php endif; ?>
                      <?php if($key == "tags"): ?>
                        <select multiple="multiple" class="tags" name="tags[]" style="width:100%">
                          <?php
                            $x = explode(',', $value);
                            foreach($x as $y){
                              echo "<option value=$y selected>$y</option>";
                            }
                          ?>
                        </select>
                      <?php else: ?>
                      <input type="text" class="form-control <?= ($key == "jumlah_dana" ? "nominal":"") ?>" id="dir_name" name="<?= $key; ?>" placeholder="Nama folder" value="<?= $value ?>" required>
                      <?php endif; ?>
                    <?php if ($key == "jumlah_dana"): ?></div><?php endif; ?>
                  <?php else: ?>
                    <p class="form-control-static" ><?= (($key == "jumlah_dana") ? "Rp ". number_format($value, 0, ',', '.'):(($key == "tags") ? implode(', ', explode(',', $value)):$value)) ?></p>
                  <?php endif;else:?>
                    <input type="text" class="form-control <?= ($key == "jumlah_dana" ? "nominal":"") ?>" id="dir_name" name="<?= $key; ?>" placeholder="Nama folder" value="<?= $value ?>" required>
                  <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if(isset($research_members)): ?>
          <div class="form-group">
              <label for="dir_name" class="col-sm-2 control-label">Ketua:</label>
              <div class="col-sm-10">
                    <p class="form-control-static" ><?= $research_members->ketua->nama_ketua; ?></p>
              </div>
          </div>
          <?php if($research_members->ketua->id_ketua == $this->session->userdata('login')->uid): ?>
          <div class="form-group">
              <label for="dir_name" class="col-sm-2 control-label">Anggota:</label>
              <div class="col-sm-10">
                <select multiple="multiple" class="form-control select2" id="anggota" name="anggota[]" style="width:100%" placeholder="Pilih anggota" value="<?= $value ?>" >
                <?php foreach($research_members->anggota as $a): ?>
                  <option value="<?= $a->uid; ?>" selected><?= "(".$a->no_induk.") ".$a->nama_lengkap; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="save" value="Simpan">
            </div>
          </div>
          <?php else: ?>
          <div class="form-group">
              <label for="dir_name" class="col-sm-2 control-label">Anggota:</label>
              <div class="col-sm-10">
                <ol class="form-control-static">
                <?php foreach($research_members->anggota as $a): ?>
                  <li><?= "(".$a->no_induk.") ".$a->nama_lengkap; ?></li>
                <?php endforeach; ?>
                </ol>
              </div>
          </div>
          <?php endif;?>
        <?php else: ?>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-primary" name="save" value="Simpan">
          </div>
        </div>
        <?php endif; ?>
        <?= form_close(); ?>
    </div>
</div>
<script>
$(".nominal").mask("#.##0", {reverse: true});
$(".select2").select2({
  placeholder:"  Pilih anggota",
  
  tokenSeparators: [','],
  minimumInputLength: 3,
  ajax: {
    url: "<?= site_url() ?>/home/get_user_list/",
    data: function(params){
      return {query:params.term};
    },
    processResults: function (data) {
      return {
        results: JSON.parse(data)
      };
    }
  }
});
$(".tags").select2({
  placeholder:"  Pisahkan dengan koma",
  tags:[],
  tokenSeparators: [','],
  minimumResultsForSearch: -1
});
</script>