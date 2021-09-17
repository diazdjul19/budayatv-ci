<div class="container-fluid">
    <ul class="nav nav-tabs nav-tabs-fillup mt-5" role="tablist" data-init-reponsive-tabs="dropdownfx">
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'ditagih') echo " active bold"; ?>"
               href="laporan/perproyek">
                <span>Progress</span></a>
        </li>
    </ul>

    <?php $this->load->view($hal); ?>

</div>