require('./bootstrap');

$(".hover").mouseleave(
    function () {
        $(this).removeClass("hover");
    }
);