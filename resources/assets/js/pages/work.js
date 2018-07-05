import { textareaHeight } from '../helpers/textareaHeight';
textareaHeight();

import Sortable from 'sortablejs';

$('tbody').each(function () {
    Sortable.create(this, {
        draggable: '.tr-draggable',
        dataIdAttr: 'data-id',
        handle: '.td-draggable',

        scroll: true,
        scrollSensitivity: 30,
        scrollSpeed: 10,

        onEnd(event) {
            let element = event.item;

            let parent = element.parentElement;

            let allElementCount = parent.childElementCount;

            $(parent).children().each(function () {
                let id = this.dataset.id;
                let priority = allElementCount - $(this).index();

                axios.patch(`/work/sort/${id}`, {
                    priority: priority
                });
            });
        }
    });
});

