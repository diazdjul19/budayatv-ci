<ul class="menu-items">
    <li class="m-t-30 <?php if ($menu == 'Dashboard') {
        echo "active";
    } ?>">
        <a href="dashboard">
            <span class="title">Dashboard</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'Dashboard') {
            echo "bg-yellow text-primary";
        } ?>"><i class="pg-home"></i></span>
    </li>

    <li class=" <?php if ($menu == 'anggaran') {
        echo "active";
    } ?>">
        <a href="anggaran">
            <span class="title">Anggaran</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'anggaran') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-check-circle-o"></i> </span>
    </li>
    <li class=" <?php if ($menu == 'proyek') {
        echo "active";
    } ?>">
        <a href="proyek">
            <span class="title">Proyek</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'proyek') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-building"></i> </span>
    </li>
    <li class=" <?php if ($menu == 'perpustakaan') {
        echo "active";
    } ?>">
        <a href="perpustakaan">
            <span class="title">Perpustakaan</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'perpustakaan') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-book"></i> </span>
    </li>
    <li class=" <?php if ($menu == 'about_us') {
        echo "active";
    } ?>">
        <a href="about_us">
            <span class="title">About Us</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'about_us') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-info"></i> </span>
    </li>
    <li class=" <?php if ($menu == 'events') {
        echo "active";
    } ?>">
        <a href="events">
            <span class="title">Events</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'events') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-calendar"></i> </span>
    </li>
    <li class=" <?php if ($menu == 'user' || $menu == 'role' || $menu == 'tipe_proyek' || $menu == 'kategori_event' || $menu == 'tipe_pustaka'
    ) {
        echo "active open";
    } ?>">
        <a href="javascript:;">
            <span class="title">Pengaturan</span>
            <span class="arrow <?php if ($menu == 'user' || $menu == 'role' || $menu == 'tipe_proyek' || $menu == 'kategori_event' || $menu == 'tipe_pustaka') { echo "active open";} ?>"></span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'user' || $menu == 'role' || $menu == 'tipe_proyek' || $menu == 'kategori_event' || $menu == 'tipe_pustaka') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-cog"></i> </span>

        <ul class="sub-menu">
            <li class="<?php if ('user' == $menu) { echo "active";} ?>">
                <a href="user">Users</a>
                <span class="icon-thumbnail <?php if ('user' == $menu) { echo "bg-yellow text-primary";} ?>"><i class="fa fa-user"></i> </span>
            </li>
            <li class="<?php if ('role' == $menu) { echo "active";} ?>">
                <a href="role">Role</a>
                <span class="icon-thumbnail <?php if ('role' == $menu) { echo "bg-yellow text-primary";} ?>"><i class="fa fa-lock"></i> </span>
            </li>
            <li class="<?php if ('tipe_proyek' == $menu) { echo "active";} ?>">
                <a href="proyek_tipe">Tipe Proyek</a>
                <span class="icon-thumbnail <?php if ('tipe_proyek' == $menu) { echo "bg-yellow text-primary";} ?>"><i class="fa fa-cog"></i> </span>
            </li>
            <li class="<?php if ('tipe_pustaka' == $menu) { echo "active";} ?>">
                <a href="tipe_pustaka">Tipe Pustaka</a>
                <span class="icon-thumbnail <?php if ('tipe_pustaka' == $menu) { echo "bg-yellow text-primary";} ?>"><i class="fa fa-certificate"></i> </span>
            </li>
            <li class="<?php if ('kategori_event' == $menu) { echo "active";} ?>">
                <a href="kategori_event">Kategori Event</a>
                <span class="icon-thumbnail <?php if ('kategori_event' == $menu) { echo "bg-yellow text-primary";} ?>"><i class="fa fa-calendar-check-o"></i></span>
            </li>
        </ul>
    </li>

    <li class="m-t-30 <?php if ($menu == 'BtvChanel') {
        echo "active";
    } ?>">
        <a href="BtvChanel">
            <span class="title">BTV Chanel</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'BtvChanel') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-television"></i></span>
    </li>

    <li class=" <?php if ($menu == 'BtvJamty') {
        echo "active";
    } ?>">
        <a href="BtvJamty">
            <span class="title">BTV JamTayang</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'BtvJamty') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-clock-o"></i> </span>
    </li>
    
    <li class=" <?php if ($menu == 'BtvKategori') {
        echo "active";
    } ?>">
        <a href="BtvKategori">
            <span class="title">BTV Kategori</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'BtvKategori') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-th-list"></i>
    </li>
        
    <li class=" <?php if ($menu == 'BtvProgramacara') {
        echo "active";
    } ?>">
        <a href="BtvProgramacara">
            <span class="title">BTV Program Acara</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'BtvProgramacara') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-industry"></i>
    </li>

    <li class=" <?php if ($menu == 'BtvProvinsi') {
        echo "active";
    } ?>">
        <a href="BtvProvinsi">
            <span class="title">BTV Provinsi</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'BtvProvinsi') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-map-marker"></i>
    </li>

    <li class=" <?php if ($menu == 'BtvSetDaerah') {
        echo "active";
    } ?>">
        <a href="BtvSetDaerah">
            <span class="title">BTV SetDaerah</span>
        </a>
        <span class="icon-thumbnail <?php if ($menu == 'BtvSetDaerah') {
            echo "bg-yellow text-primary";
        } ?>"><i class="fa fa-area-chart"></i>
    </li>

    <li class="">
        <a href="auth/logout"><span class="title">Logout</span></a>
        <span class="icon-thumbnail"><i class="fa fa-power-off"></i></span>
    </li>
</ul>