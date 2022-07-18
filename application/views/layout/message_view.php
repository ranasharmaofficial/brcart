<?php
if(strlen($this->session->flashdata('message')) > 0) {
    ?>
	</br>
    <div class="row">
        <div class="col-sm-12">
            <div style="color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;padding:5px;border-radius:5px;" class=" text-center shadown-sm">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        </div>
    </div>
	</br>
    <?php
}
?>
