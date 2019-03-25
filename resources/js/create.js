// Menu control
$('.sub-menu-btn').click(function () {
    // Change class of the button
    if ($(this).hasClass('opened')) {
        $(this).removeClass('opened');
        $('.upper-menu').removeClass('show');
    } else {
        $('.sub-menu-btn').removeClass('opened');
        $(this).addClass('opened');
        $('.upper-menu').addClass('show');
    }

    let menuClassToShow = '.' + $(this).attr('id').replace('Btn', '');
    if ($(menuClassToShow).hasClass('show')) {
        $(menuClassToShow).removeClass('show');
    } else {
        $('.upper-menu-category').removeClass('show');
        $(menuClassToShow).addClass('show');
    }
});