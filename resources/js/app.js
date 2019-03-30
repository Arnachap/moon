require('./bootstrap');
require('./create');

$(window).scroll(function () {
    const scrollPosition = $(window).scrollTop();
    if (scrollPosition > 1) {
        $('#main-nav').addClass('scrolled');
    } else {
        $('#main-nav').removeClass('scrolled');
    }
});