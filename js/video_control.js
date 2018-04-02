$(function () {
    $('.video-control').click(function () {
        if ($('.home-vid').get(0).paused) {
            $('.home-vid').get(0).play();
            $('.video-control').removeClass('fa-play');
            $('.video-control').addClass('fa-pause');

        } else {
            $('.home-vid').get(0).pause();
            $('.video-control').removeClass('fa-pause');
            $('.video-control').addClass('fa-play');

        }
    });
});