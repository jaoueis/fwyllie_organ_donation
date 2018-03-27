$(function () {
    $('.burger-button').click(function () {
        $('.main-nav-overlay').animate({right: 0}, 600, function () {
            $(this).addClass('animation');
        });
    });

    $('.close-button').click(function () {
        $('.main-nav-overlay').animate({right: '-100%'});
        $('.main-nav-overlay').removeClass('animation');
    });
});