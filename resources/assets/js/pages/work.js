import { textareaHeight } from '../helpers/textareaHeight';
textareaHeight();

import Sortable from 'sortablejs';

$('tbody').each(function () {
    Sortable.create(this, {
        draggable: '.tr-draggable',
        dataIdAttr: 'data-id',
        handle: '.td-draggable',

        onEnd(event) {
            let element = event.item;

            let allElementCount = element.parentElement.childElementCount;

            let elementPriority = allElementCount - $(element).index();

            let elementID = element.dataset.id;

            axios.patch(`/work/sort/${elementID}`, {
                priority: elementPriority
            }).then().catch(() => console.log('failed!'));
        }
    });

});

