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
        <?= form_open(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"")."&update=1", 'class="form-horizontal"'); ?>
        <?php foreach($research_data[0] as $key=>$value):
                if($key=="id" || $key=="tipe" || $key=="uid") continue;
        ?>
            <div class="form-group">
                <label for="dir_name" class="col-sm-2 control-label"><?= ucfirst(implode(" ", explode("_", $key))) ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dir_name" name="<?= $key; ?>" placeholder="Nama folder" value="<?= $value ?>" required>
<!--                    <p class="form-control-static" ><?= $value ?></p>-->
                </div>
            </div>
        <?php endforeach; ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="save" value="Simpan">
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>