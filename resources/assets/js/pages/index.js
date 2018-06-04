// Have to re-import jQuery because FullCalendar can't attach itself to the registered jQuery in bootstrap.js
$ = require('jquery');

require('fullcalendar');
require('lightbox2');

$('#calendar').fullCalendar({
    defaultView: 'listYear',
    locale: 'lv',
    themeSystem: 'bootstrap4',
    navLinks: true,

    header: {
        left: 'prev, next today',
        center: 'title',
        right: 'listYear, listMonth'
    },

    events: [
        {
            title: 'Pasākums 1',
            start: '2018-06-20'
        },

        {
            title: 'Pasākums 2',
            start: '2018-08-12'
        },

        {
            title: 'Pasākums 3',
            start: '2018-09-22'
        },

        {
            title: 'Pasākums 4',
            start: '2019-12-31'
        }
    ]
});
