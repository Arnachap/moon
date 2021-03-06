// Menu control
$('.sub-menu-btn').click(function() {
    let menuClassToShow =
        '.' +
        $(this)
            .attr('id')
            .replace('Btn', '');

    // Change class of the button
    if ($(this).hasClass('opened')) {
        $(this).removeClass('opened');
        $('.upper-menu').removeClass('show');
        $(menuClassToShow).removeClass('show');
    } else {
        $('.sub-menu-btn').removeClass('opened');
        $(this).addClass('opened');
        $('.upper-menu').addClass('show');
        $('.upper-menu-category').removeClass('show');
        $(menuClassToShow).addClass('show');
    }
});

// Img change
const bowtieImg = $('#bowtie');
const tissuImg = $('#tissu');
let bowtieShape = 'classic';
let bowtieWood = '1';
let bowtieTissu = 'tissu1';
const formShape = $('#formShape');
const formWood = $('#formWood');
const formTissu = $('#formTissu');

const changeBowtieImg = () => {
    let newImgSrc = `/img/create/noeuds-pap/${bowtieShape}/${bowtieShape}-${bowtieWood}.png`;
    bowtieImg.attr('src', newImgSrc);
};

$('.shape').click(function() {
    bowtieShape = $(this).attr('id');
    changeBowtieImg();

    formShape.val(bowtieShape);

    $('.wood').each(function() {
        let woodId = $(this).attr('id');
        let newWoodSrc = `/img/create/noeuds-pap/${bowtieShape}/${bowtieShape}-${woodId}.png`;
        $(this).attr('src', newWoodSrc);
    });

    $('.upper-menu').removeClass('show');
});

$('.wood').click(function() {
    bowtieWood = $(this).attr('id');
    changeBowtieImg();

    formWood.val(bowtieWood);

    $('.shape').each(function() {
        let shapeId = $(this).attr('id');
        let newShapeSrc = `/img/create/noeuds-pap/${shapeId}/${shapeId}-${bowtieWood}.png`;
        $(this).attr('src', newShapeSrc);
    });

    $('.upper-menu').removeClass('show');
});

$('.tissu').click(function() {
    bowtieTissu = $(this).attr('id');
    let newTissuSrc = `/storage/tissus/${bowtieTissu}`;
    tissuImg.attr('src', newTissuSrc);

    formTissu.val($(this).data('tissu'));

    $('.upper-menu').removeClass('show');
});

// Size selection
$('.radio-btn').click(function() {
    let size = $(this).attr('id');
    $('#formSize').val(size);

    if (size == 'enfant') {
        $('.price').text('30 €');
    } else {
        $('.price').text('40 €');
    }
});
