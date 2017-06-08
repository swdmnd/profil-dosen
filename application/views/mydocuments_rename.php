<?php if($this->input->get("old_name") != ""): ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h4><a role="button" class="close" aria-label="Close" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span aria-hidden="true">&times;</span></a>Ubah nama <?= $this->input->get("type").' \'<b>'.$this->input->get("old_name").'</b>\'' ?></h4>
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
        <?= form_open(site_url()."/home/mydocuments/rename/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""), 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="new_name" class="col-sm-2 control-label">Nama baru</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="new_name" name="new_name" placeholder="Nama baru" required>
                    <input type="text" class="form-control" id="old_name" name="old_name" style="display:none" value="<?= $this->input->get("old_name"); ?>" readonly required>
                    <input type="text" class="form-control" id="type" name="type" style="display:none" value="<?= $this->input->get("type"); ?>" readonly required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="rename" value="Ubah Nama">
                    <a role="button" class="btn btn-danger" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>">Batalkan</a>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>
<?php endif; ?>