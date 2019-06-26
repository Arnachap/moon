require('./bootstrap');
require('./create');
require('./sortable');

if (window.location.pathname === '/' || window.location.pathname === '/about') {
    $(window).scroll(function() {
        const scrollPosition = $(window).scrollTop();
        if (scrollPosition > 1) {
            $('#main-nav').addClass('scrolled');
        } else {
            $('#main-nav').removeClass('scrolled');
        }
    });
} else {
    $('#main-nav').addClass('scrolled');
}

$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
