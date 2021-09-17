<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title><?php if (isset($title)) { echo $title; }else{ echo "SimonPro";} ?></title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no"/>
    <link href="assets/img/logo2.png" rel="shortcut icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <?php if (isset($css)) { ?>
        <?php $this->load->view($css); ?>
    <?php } ?>

    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/plugins/summernote/css/summernote.css" rel="stylesheet">
    <link href="assets/plugins/summernote/css/summernote-bs3.css" rel="stylesheet">

    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>

    <link class="main-stylesheet" href="assets/css/style.css" rel="stylesheet" type="text/css"/>


</head>
<body class="fixed-header menu-pin">
<nav class="page-sidebar" data-pages="sidebar">
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <p class="text-white"><i class="l"></i><i class="sl-date"></i> Shortcut</p>
    </div>
    <div class="sidebar-header">
        <span>SIMONPRO</span>
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20 hidden-md-down"
                    data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-menu">
        <?php $this->load->view('menu'); ?>
        <div class="clearfix"></div>
    </div>
</nav>
<div class="page-container ">
    <div class="header ">
        <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar"></a>
        <div class="">
            <div class="brand inline">
                <span>SIMONPRO</span>
            </div>
            <ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">
                <li class="p-r-10 inline">
                    <div class="dropdown">
                        <a href="javascript:;" id="notification-center" class="header-icon pg pg-world"
                           data-toggle="dropdown">
                            <?php if ($_notifi_user == 1) { ?>
                                <span class="bubble"><?php echo $_notifi_sum; ?></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu notification-toggle" role="menu"
                             aria-labelledby="notification-center">
                            <div class="notification-panel">
                                <div class="notification-body scrollable">
                                    <?php
                                    if (count($_notifi_list)) {
                                        foreach ($_notifi_list as $nl) {
                                            ?>
                                            <div class="notification-item  clearfix">
                                                <div class="heading">
                                                    <a href="<?php echo $nl->link_notifikasi; ?>"
                                                       class="text-danger pull-left">
                                                        <i class="fa fa-exclamation-triangle m-r-10"></i>
                                                        <span <?php if ($nl->baca_notifikasi == 0) {
                                                            echo "class='bold'";
                                                        } ?>><?php echo $nl->pesan_notifikasi; ?></span>
                                                    </a>
                                                    <span class="pull-right time"><?php echo time_ago($nl->create_notifikasi); ?></span>
                                                </div>
                                                <div class="option">
                                                    <a href="#" class="mark"></a>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="notification-footer text-center">
                                    <a href="notifikasi" class="">Read all notifications</a>
                                    <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                        <i class="pg-refresh_new"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
                <span class="semi-bold"><?php echo $_user->nama_user; ?></span>
            </div>
            <div class="dropdown pull-right hidden-md-down">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
              <span class="thumbnail-wrapper d32 circular inline">
              <img src="assets/img/profiles/b.jpg" alt="" data-src="assets/img/profiles/<?php if($_user->foto_user){echo $_user->foto_user;}else{echo 'b2x.jpg';} ?>"
                   data-src-retina="assets/img/profiles/b.jpg" width="32" height="32">
              </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                    <a href="profile" class="dropdown-item"><i class="pg-settings_small"></i> Profile</a>
                    <a href="auth/logout" class="clearfix bg-master-lighter dropdown-item">
                        <span class="pull-left">Logout</span>
                        <span class="pull-right"><i class="pg-power"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper ">
        <div class="content ">
            <?php $this->load->view($page); ?>
        </div>
        <div class=" container-fluid">
            <div class="footer">
            <div class="copyright sm-text-center">
                <p class="small ml-3">
                    <span class="hint-text">Copyright &copy; 2018 </span>
                    <span class="font-montserrat">SIMONPRO | Bank Indonesia</span>.
                </p>
            </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/plugins/classie/classie.js" type="text/javascript"></script>
<script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript" ></script>
<script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript" ></script>
<script src="assets/plugins/inputmask/dist/jquery.inputmask.bundle.js"></script>
<script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

<script src="assets/pages/js/pages.js"></script>

<script src="assets/js/scripts.js" type="text/javascript"></script>
<?php if (isset($js)) {
    $this->load->view($js);
} ?>
</body>
</html>