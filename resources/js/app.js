require('./bootstrap');

$(window).scroll(function () {
    var sc = $(window).scrollTop();
    if (sc > 1) {
        $('#main-nav').addClass('scrolled');
    } else {
        $('#main-nav').removeClass('scrolled');
    }
});

$(".hover").mouseleave(
    function () {
        $(this).removeClass("hover");
    }
);