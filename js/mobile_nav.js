$(function () {
    $('.burger-button').click(function () {
        $('body').addClass('no-scroll');
        $('.main-nav-overlay').animate({right: 0}, 600, function () {
            $(this).addClass('animation');
            $('.mobile-nav').animate({opacity: 1, margin: 0}, 300);
        });
    });

    $('.close-button').click(function () {
        $('.main-nav-overlay').animate({right: '-100%'});
        $('.main-nav-overlay').removeClass('animation');
        $('.mobile-nav').animate({opacity: 0, margin: '-10px 0 0 0'}, 300);
        $('body').removeClass('no-scroll');
    });

    $(window).scroll(function () {
        if (window.pageYOffset > 80) {
            $('.header-bar-container').addClass('white-nav');
        } else {
            $('.header-bar-container').removeClass('white-nav');
        }
    });
});