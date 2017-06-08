<div class="panel panel-info">
    <div class="panel-heading">
        <h4><a role="button" class="close" aria-label="Close" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span aria-hidden="true">&times;</span></a>Upload file ke '<?= $this->input->get('d') ?>'</h4>
    </div>
    
    <div class="panel-body">
        <?= $this->upload->display_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php
            if($this->session->flashdata("failure")):
        ?>
            <div class="alert alert-danger" role="alert"><?= $this->session->flashdata("failure") ?></div>
        <?php
            endif;
        ?>
        <?php echo form_open_multipart(site_url()."/home/mydocuments/upload/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""), 'class="form-horizontal"');?>
            <div class="form-group">
                <label for="file_name" class="col-sm-2 control-label">Nama file (optional)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="file_name" name="file_name" placeholder="Nama file">
                </div>
            </div>
            <div class="form-group">
                <label for="file" class="col-sm-2 control-label">Plih file</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" name="file" size="20" required/>
                    <dl>
                        <dd>Format jpg, png, pdf, docx, xlsx, pptx, doc, ppt, xls, zip, rar<br>Ukuran max. 2 MB</dd>
                    </dl>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="upload" value="Upload">
                    <a role="button" class="btn btn-danger" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>">Batalkan</a>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>