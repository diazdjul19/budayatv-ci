
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budaya TV</title>
    <base href="<?= base_url() ?>">
    <link rel="stylesheet" href="assets/assets-budayatv/css/main.css">
    <link rel="stylesheet" href="assets/assets-budayatv/plugins/aos/dist/aos.css">
    <link rel="stylesheet" href="assets/assets-budayatv/plugins/videojs/video-js.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top pl-4 pr-4 " style="background-color:#000000;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/assets-budayatv/img/budaya-tv-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Budaya TV
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <a class="navbar-brand" href="#">
                <img src="assets/assets-budayatv/img/budaya-tv-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Budaya TV
            </a> -->
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-weight: bold;">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="livetv/get_value">LIVE TV <i class="fas fa-circle" style="color: red; font-size: 5px;"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            STASIUN TV
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">BTV DKI Jakarta </a>
                            <a class="dropdown-item" href="#">...</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">JADWAL TAYANG</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ABOUT BTV
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">TENTANG KAMI </a>
                            <a class="dropdown-item" href="#">HUBUNGI KAMI</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="hero">
        <div class="hero-wrapper">
            <div class="hero-inner" style="margin-top: 70px;">
                <div class="hero-logo">
                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                </div>
                <div class="hero-caption">
                    <h1>Budaya Televisi</h1>
                    <p class="mb-0">
                        Menyajikan budaya, kuliner, dan pariwisata dari berbagai wilayah di Indonesia dalam bentuk
                        video,
                        siaran langsung, dan artikel.
                    </p>
                </div>
            </div>
        </div>
        <div class="hero-media">
            <video loop poster="assets/assets-budayatv/img/poster.png">
                <source src="https://v6.siar.us/btnsemarang/live/playlist.m3u8">
            </video>
            <button type="button" class="hero-play-button">
                <i class="ri-play-fill"></i>
            </button>
        </div>
    </div>

    <section id="channels" class="my-5 py-5">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="channel-list">
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/monas.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>DKI Jakarta</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/tugu-kujang-bogor.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Bogor</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bandung-jembatan-pasupati.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Bandung</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/semarang-pantai-marina.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Semarang</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/salatiga.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Salatiga</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Sukoharjo</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>DI Yogyakarta</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Wonogiri</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Bali</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Boyolali</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Sragen</h2>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="channel-list-item" data-aos="fade-up"
                            data-aos-duration="1000" data-toggle="play-video">
                            <div class="channel-list-background">
                                <img src="assets/assets-budayatv/img/bromo.jpg" alt="Logo">
                            </div>
                            <div class="channel-list-inner">
                                <div class="channel-list-logo">
                                    <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h2>Bayuwangi</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="player-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="player-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="player-modalLabel">
                        <img src="assets/assets-budayatv/img/budaya-tv-logo.png" alt="">DKI Jakarta
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="video-player-wrapper">
                        <video id="player-video" class="video-js" controls preload="auto"
                            poster="assets/assets-budayatv/img/poster.png">
                            <source src="assets/assets-budayatv/video/budaya-trailer.mp4">
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser.
                            </p>
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="footer" class="footer py-4">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <p class="fs-12 text-center mb-0">
                        &copy; 2021 <b>Budaya TV</b> All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/assets-budayatv/js/jquery-3.5.1.min.js"></script>
    <script src="assets/assets-budayatv/js/app.js"></script>

    <script src="assets/assets-budayatv/js/bootstrap.bundle.min.js"></script>
    <script src="assets/assets-budayatv/plugins/aos/dist/aos.js"></script>
    <script src="assets/assets-budayatv/plugins/videojs/video.min.js"></script>

    <script>
        // $(document).ready(function(){       
        //     var scroll_start = 0;
        //     var startchange = $('.hero');
        //     var offset = startchange.offset();
        //         if (startchange.length){
        //     $(document).scroll(function() { 
        //         scroll_start = $(this).scrollTop();
        //         if(scroll_start > offset.top) {
        //             $(".navbar").css('background-color', '#1D1D1D');
        //         } else {
        //             $('.navbar').css('background-color', '#000000');
        //         }
        //     });
        //         }
        // });
    </script>

</body>

</html>