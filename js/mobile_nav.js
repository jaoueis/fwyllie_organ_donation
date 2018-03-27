$(function () {
    $('.burger-button').click(function () {
        $('.main-nav-overlay').animate({right: 0}, 600, function () {
            $(this).addClass('animation');
            $('.mobile-nav').animate({opacity: 1, margin: 0}, 300);
        });
    });

    $('.close-button').click(function () {
        $('.main-nav-overlay').animate({right: '-100%'});
        $('.main-nav-overlay').removeClass('animation');
        $('.mobile-nav').animate({opacity: 0, margin: '-10px 0 0 0'}, 300);
    });
});