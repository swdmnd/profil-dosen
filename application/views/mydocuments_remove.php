<?php if($this->input->post("selected_directory") || ($this->input->post("selected_file"))): ?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h4><a role="button" class="close" aria-label="Close" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span aria-hidden="true">&times;</span></a>Peringatan</h4>
    </div>
    
    <div class="panel-body">
        <h4>
            Anda akan menghapus
            <?php
                $remove_file="";
                $remove_directory="";
                if($this->input->post("selected_directory"))
                    foreach($this->input->post("selected_directory") as $i){
                        echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;folder '<b>".$i."</b>' beserta isinya";
                        $remove_directory.=$i."/";
                    }
                if($this->input->post("selected_file"))
                    foreach($this->input->post("selected_file") as $i){
                        echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;file '<b>".$i."</b>'";
                        $remove_file.=$i."/";
                    }
            ?>
            <br><br>Lanjutkan?
        </h4><br>
        <form method="post" action="<?= site_url()."/home/mydocuments/remove/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>">
            <button class="btn btn-primary" type="submit" name="data" value="<?= "y=1&remove_directory=".urlencode($remove_directory). "&remove_file=".urlencode($remove_file) ?>">Ya</button>
            <a role="button" class="btn btn-danger" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>">Batalkan</a>
        </form>
    </div>
</div>
<?php endif; ?>