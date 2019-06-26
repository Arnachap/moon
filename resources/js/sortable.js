import Sortable from 'sortablejs';

const el = document.getElementById('sortable');

if (el) {
    const sortable = Sortable.create(el, {
        animation: 300,
        handle: '.handle',
        easing: 'ease-out'
    });
}
