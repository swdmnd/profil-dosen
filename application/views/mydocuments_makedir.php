<div class="panel panel-info">
    <div class="panel-heading">
        <h4><a role="button" class="close" aria-label="Close" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span aria-hidden="true">&times;</span></a>Buat folder baru di '<?= $this->input->get('d') ?>'</h4>
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
        <?= form_open(site_url()."/home/mydocuments/makedir/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""), 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="dir_name" class="col-sm-2 control-label">Nama Folder</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dir_name" name="dir_name" placeholder="Nama folder" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="makedir" value="Buat Folder">
                    <a role="button" class="btn btn-danger" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>">Batalkan</a>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>