<div class="container-fluid">


    <ul class="nav nav-tabs nav-tabs-fillup mt-5" role="tablist" data-init-reponsive-tabs="dropdownfx">
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'rugi_laba_proyek') echo " active bold"; ?>"
               href="laporan/perproyek">
                <span>Laba Rugi Per Proyek</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'rugi_laba') echo " active bold"; ?>"
               href="laporan">
                <span>Laba Rugi Keseluruhan</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'papan_status') echo " active "; ?>"
               href="laporan/papan_status">
                <span>Papan Status</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'penagihan') echo " active "; ?>"
               href="laporan/termin_blm_ditagih">
                <span>Termyn Blm Ditagih</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'piutang') echo " active "; ?>"
               href="laporan/piutang">
                <span>AGING PIUTANG</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if ($headmenu == 'invoice_lunas') echo " active "; ?>"
               href="laporan/invoice_lunas">
                <span>Invoice Lunas</span></a>
        </li>
    </ul>

    <?php $this->load->view($hal); ?>
</div>