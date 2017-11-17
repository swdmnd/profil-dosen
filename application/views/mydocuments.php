<?php
if($this->input->get("sd")){
    $this->load->view('mydocuments_research');
}

if($action){
    $this->load->view('mydocuments_'.$action);
}
?>

<?php if($this->session->flashdata("success")): ?>
    <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $this->session->flashdata("success") ?></div>
<?php endif; ?>

<style>
    .dir-item{
        text-decoration: none;
        color:black;
        word-wrap: break-word;
        border-radius: 5px;
    }

    .dir-item-container{
        padding:20px;
    }

    .btn-parent{
        padding:0px !important;
    }

    .btn-inherit{
        all:inherit;
        display:block;
        margin:0px;
        padding:10px 15px;
        border: none;
    }

    .dir-item-container:hover{
        background: #fcfcfc;
    }

    .delete-icon{
        position:absolute;
        top:0px;
        right:0px;
        color:red;
        opacity:0.3;
    }

    .delete-icon:hover{
        opacity:1;
    }

    .checkbox label:after,
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
        left: -12px;
        top: -10px;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
/*        transform: scale(3) rotateZ(-20deg);*/
        opacity: 0;
/*        transition: all .3s ease-in;*/
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
/*        transform: scale(1) rotateZ(0deg);*/
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
    }
</style>

<div class="panel panel-info">

    <div class="panel-heading">
        <?php
            $pt = "/";
            foreach($dir_path as $p):
                if($p!="root"){
                    $pt .= $p.'/';
                }
        ?>
            <a href="<?= site_url()."/home/mydocuments/?d=".$pt.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><?= ($p=="root"?'<h4 style="display:inline"><i class="glyphicon glyphicon-home"></i></h4>':'<h3 style="display:inline">'.$p.'</h3>') ?></a><h3 style="display:inline">&nbsp;&nbsp;&frasl;&nbsp;</h3>
        <?php
            endforeach;
        ?>
    </div>

    <form id="multiple-action" action="<?= site_url()."/home/mydocuments/multiple-action/?d=".$pt.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>" method="post"></form>

    <div class="panel-body">
        <ul class="nav nav-pills">
            <li><a role="presentation" class="btn" href="<?= site_url()."/home/mydocuments/upload/?d=".$pt.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><i class="glyphicon glyphicon-plus"></i> Upload File</a></li>
            <li><a role="presentation" class="btn" href="<?= site_url()."/home/mydocuments/makedir/?d=".$pt.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><i class="glyphicon glyphicon-folder-close"></i> Buat Folder</a></li>
            <li><a role="presentation" class="btn btn-parent"><button type="submit" value="remove" name="intent" form="multiple-action" class="btn-inherit"><i class="glyphicon glyphicon-remove"></i> Hapus</button></a></li>
            <li><a role="presentation" class="btn btn-parent"><button type="submit" value="rename" name="intent" form="multiple-action" class="btn-inherit"><i class="glyphicon glyphicon-edit"></i> Ubah nama</button></a></li>

<!--
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><small>multiple</small></li>
                    <li><a role="presentation" class="btn" href="<?= site_url()."/home/mydocuments/makedir/?d=".$pt.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><i class="glyphicon glyphicon-folder-close"></i> Buat Folder</a></li>
                    <li><a role="presentation" class="btn" href="<?= site_url()."/home/mydocuments/makedir/?d=".$pt.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><i class="glyphicon glyphicon-folder-close"></i> Buat Folder</a></li>
                </ul>
            </li>
-->
        </ul>

        <hr>
        <?php
            array_splice($dir_path, 0, 1);
            if(empty($ls)):
        ?>
                <h2 style="color:#ccc"><center>Folder kosong</center></h2>
        <?php
            endif;
            $i=0;
            foreach($ls as $dir_entry):
                if($i % 4 == 0) echo '<div class="row" style="padding:0px 12px">';
                if($dir_entry->is_dir):
        ?>

        <div class="col-md-3"><div class="row"><h4 class="col-md-12 dir-item-container">
            <div class="checkbox col-md-2">
                <label>
                    <small>
                        <input type="checkbox" name="selected_directory[]" value="<?= $dir_entry->name ?>" form="multiple-action" <?= ($this->input->post('selected_directory')?(in_array($dir_entry->name, $this->input->post('selected_directory'))?"checked":""):"") ?> />
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </small>

                </label>
            </div>
            <a class="dir-item" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d').'/'.$dir_entry->name.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><i class="glyphicon glyphicon-folder-open col-md-2"></i><span class="col-md-8"><?= $dir_entry->name ?></span></a><!--<a href="<?= site_url()."/home/mydocuments/remove/?d=".$this->input->get('d')."&remove_directory=".$dir_entry->name.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span class="delete-icon"><b>&times;</b></span></a>-->
        </h4></div></div>
        <?php
                else:
        ?>
        <div class="col-md-3"><div class="row"><h4 class="col-md-12 dir-item-container">
            <div class="checkbox col-md-2">
                <label>
                    <small>
                        <input type="checkbox" name="selected_file[]" value="<?= $dir_entry->name ?>" form="multiple-action" <?= ($this->input->post('selected_file')?(in_array($dir_entry->name, $this->input->post('selected_file'))?"checked":""):"") ?> />
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </small>

                </label>
            </div>
            <a class="dir-item" href="<?= site_url()."/home/mydocuments/?d=".$this->input->get('d')."&f=".$pt.$dir_entry->name.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):"") ?>"><i class="glyphicon glyphicon-file col-md-2"></i><span class="col-md-8"><?= $dir_entry->name ?> <small>(<?= human_filesize(filesize(sanitize_path($work_dir.$pt.$dir_entry->name)), 0); ?>)</small></span></a><!--<a href="<?= site_url()."/home/mydocuments/remove/?d=".$this->input->get('d')."&remove_file=".$dir_entry->name.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""); ?>"><span class="delete-icon"><b>&times;</b></span></a>-->
        </h4></div></div>
        <?php
                endif;
                $i++;
                if($i % 4 == 0) echo '</div>';
        ?>
        <?php
            endforeach;
        ?>
    </div>
</div>
