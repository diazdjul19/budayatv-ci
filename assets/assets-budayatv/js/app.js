$(function () {

    var playerVideo = videojs('player-video');



    $(document).on("click", ".hero-play-button", function () {

        $('.hero-media video').trigger('play');

        $(this).hide();

    });



    $('.hero-media video').on("pause", function () {

        $('.hero-play-button').show();

    });



    $('.hero-media').on("click", function () {

        if (!$(this).find('video').get(0).paused) {

            $(this).find('video').trigger("pause");

        }

    });



    $(document).on("click", "[data-toggle='play-video']", function () {

        if (!$('.hero-media video').get(0).paused) {

            $('.hero-media video').trigger("pause");

        }



        $("#player-modal").modal("show");

        playerVideo.play();

    });



    $("#player-modal").on("hide.bs.modal", function () {

        playerVideo.pause();

    })



});





$(window).on("load", function () {

    AOS.init({

        once: true,

    });

});


$(document).ready(function(){       
    var scroll_start = 0;
    var startchange = $('.hero');
    var offset = startchange.offset();
        if (startchange.length){
    $(document).scroll(function() { 
        scroll_start = $(this).scrollTop();
        if(scroll_start > offset.top) {
            $(".navbar").css('background-color', '#1D1D1D');
        } else {
            $('.navbar').css('background-color', '#000000');
        }
    });
        }
});