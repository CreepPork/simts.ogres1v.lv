import Sortable from 'sortablejs';

$('tbody').each(function () {
    let beforeMovementElementPriorities = {};

    Sortable.create(this, {
        draggable: '.tr-draggable',
        dataIdAttr: 'data-id',
        handle: '.td-draggable',

        scroll: true,
        scrollSensitivity: 30,
        scrollSpeed: 10,

        onChoose(event) {
            let element = event.item;

            let parent = element.parentElement;

            let allElementCount = parent.childElementCount;

            $(parent).children().each(function () {
                let id = this.dataset.id;
                beforeMovementElementPriorities[id] = allElementCount - $(this).index();
            });
        },

        onEnd(event) {
            let element = event.item;

            let parent = element.parentElement;

            let allElementCount = parent.childElementCount;

            let elementPriorities = {};

            $(parent).children().each(function () {
                let id = this.dataset.id;
                let priority = allElementCount - $(this).index();

                if (beforeMovementElementPriorities[id] !== priority)
                {
                    elementPriorities[id] = priority;
                }
            });

            if (! _.isEmpty(elementPriorities))
            {
                // noinspection ES6ModulesDependencies
                // noinspection ES6ModulesDependencies
                axios.patch('/work/sort', elementPriorities)
                    .catch(() => $('#failModal').modal());
            }
        }
    });
});

