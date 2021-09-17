<?php
$alertclass = "";
if($this->session->flashdata('message-success')){
    $alertclass = "success";
} else if ($this->session->flashdata('message-warning')){
    $alertclass = "warning";
} else if ($this->session->flashdata('message-info')){
    $alertclass = "info";
} else if ($this->session->flashdata('message-danger')){
    $alertclass = "danger";
}

if($this->session->flashdata('message-'.$alertclass)){ ?>
    <div id="alerts">
        <div class="alert alert-<?php echo $alertclass; ?>">
            <i class="fa fa-check"></i>
            <?php echo $this->session->flashdata('message-'.$alertclass); ?>
        </div>
    </div>
<?php } ?>



