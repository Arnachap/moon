import Sortable from 'sortablejs';

const collectionSort = document.getElementById('collectionSort');

if (collectionSort) {
    const collectionSortable = Sortable.create(collectionSort, {
        animation: 300,
        handle: '.collectionHandle',
        easing: 'ease-out'
    });
}

const bowtieSort = document.getElementById('bowtieSort');

if (bowtieSort) {
    const bowtieSortable = Sortable.create(bowtieSort, {
        animation: 300,
        handle: '.bowtieHandle',
        easing: 'ease-out'
    });
}

const slidesSort = document.getElementById('slidesSort');

if (slidesSort) {
    const slidesSortable = Sortable.create(slidesSort, {
        animation: 300,
        handle: '.slideHandle',
        easing: 'ease-out'
    });
}
