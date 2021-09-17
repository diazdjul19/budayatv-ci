<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>Megonesia Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no"/>
    <link rel="apple-touch-icon" href="assets/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet"/>
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" media="screen"/>
    <?php $this->load->view($css); ?>
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" media="screen"/>
    <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" media="screen"/>
    <link href="assets/pages/css/pages-icons.css" rel="stylesheet">
    <link href="assets/pages/css/pages.css" rel="stylesheet"/>
    <link href="assets/css/admin.css" rel="stylesheet"/>
    <!--[if lte IE 9]>
    <link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" media="screen"/>
    <![endif]-->
</head>
<body class="fixed-header menu-pin">
<nav class="page-sidebar" data-pages="sidebar">
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-header">
        Megonesia
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
                <i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i
                    class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-menu">
        <?php $this->load->view('admin/menu'); ?>
        <div class="clearfix"></div>
    </div>
</nav>


<div class="page-container ">
    <div class="header ">
        <div class="container-fluid relative">
            <div class="pull-left full-height visible-sm visible-xs">
                <div class="header-inner">
                    <a href="#"
                        class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5"
                        data-toggle="sidebar">
                        <span class="icon-set menu-hambuger"></span>
                    </a>
                </div>
            </div>
            <div class="pull-center hidden-md hidden-lg">
                <div class="header-inner">
                    <div class="brand inline">
                        Megonesia
                    </div>
                </div>
            </div>
            <div class="pull-right full-height visible-sm visible-xs">
                <div class="header-inner">
                    <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview"
                        data-toggle-element="#quickview">
                        <span class="icon-set menu-hambuger-plus"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class=" pull-left sm-table hidden-xs hidden-sm">
            <div class="header-inner">
                <div class="brand inline">
                    Megonesia
                </div>

                <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
                    <li class="p-r-15 inline">
                        <div class="dropdown">
                            <a href="javascript:;" id="notification-center" data-toggle="dropdown">
                                <i class="fa fa-comments large-text"></i> Chat
                                <span class='badge badge-important'>3</span>
                            </a>
                            <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                                <div class="notification-panel">
                                    <div class="notification-body scrollable">
                                        <div class="notification-item unread clearfix">
                                            <div class="heading open">
                                                <a href="#" class="text-complete pull-left">
                                                    <i class="pg-map fs-16 m-r-10"></i>
                                                    <span class="bold">Carrot Design</span>
                                                    <span class="fs-12 m-l-10">David Nester</span>
                                                </a>
                                                <div class="pull-right">
                                                    <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                                        <div><i class="fa fa-angle-left"></i>
                                                        </div>
                                                    </div>
                                                    <span class=" time">few sec ago</span>
                                                </div>
                                                <div class="more-details">
                                                    <div class="more-details-inner">
                                                        <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation
                                                            <br>
                                                            distinguishes between <br>
                                                            A leader and a follower.”</h5>
                                                        <p class="small hint-text">
                                                            Commented on john Smiths wall.
                                                            <br> via pages framework.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                                                <a href="#" class="mark"></a>
                                            </div>
                                        </div>
                                        <div class="notification-item  clearfix">
                                            <div class="heading">
                                                <a href="#" class="text-danger pull-left">
                                                    <i class="fa fa-exclamation-triangle m-r-10"></i>
                                                    <span class="bold">98% Server Load</span>
                                                    <span class="fs-12 m-l-10">Take Action</span>
                                                </a>
                                                <span class="pull-right time">2 mins ago</span>
                                            </div>
                                            <div class="option">
                                                <a href="#" class="mark"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-footer text-center">
                                        <a href="#" class="">Read all notifications</a>
                                        <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                            <i class="pg-refresh_new"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="p-r-15 inline">
                        <a href="#" class="">
                            <i class="fa fa-money large-text"></i> Konfirmasi Pembayaran
                            <span class='badge badge-important'>3</span>
                        </a>
                    </li>
                    <li class="p-r-15 inline">
                        <a href="#" class="">
                            <i class="fa fa-bell large-text"></i> Notifikasi
                            <span class='badge badge-important'>3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class=" pull-right">
            <div class="visible-lg visible-md m-t-10">
                <div class="dropdown pull-right">
                    <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="semi-bold pull-left p-r-10 p-t-10 fs-16 font-heading"> <?php echo $_user->nama_user; ?>
                            <i class="fa fa-bookmark p-l-10"></i></span>
                    </button>
                    <ul class="dropdown-menu profile-dropdown" role="menu">
                        <li><a href="#"><i class="fa fa-user"></i> Profil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-ticket"></i> Tiket</a>
                        </li>
                        <li><a href="#"><i class="pg-signals"></i> Help</a>
                        </li>
                        <li class="bg-master-lighter">
                            <a href="admin/auth/logout" class="clearfix">
                                <span class="pull-left">Logout</span>
                                <span class="pull-right"><i class="pg-power"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper ">
        <?php $this->load->view('admin/alert'); ?>
        <div class="content">
            <div class="container">
                <h1 class="text-danger">Access Denied!! </h1>
                <p class="italic">User dan IP anda kami catat.</p>
            </div>
        </div>
        <div class="container-fluid container-fixed-lg footer">
            <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset">
                    <span class="hint-text">Copyright &copy; 2016 </span>
                    <span class="font-montserrat">Admin Dashboard</span>
                    Create By
                    <a href="http://megonesia.com" target="_blank" class="font-montserrat">MEGONESIA</a>.
                </p>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/script'); ?>
<?php if ($js) {
    $this->load->view($js);
} ?>
</body>
</html>