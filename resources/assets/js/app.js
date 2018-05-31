
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

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
            title: 'Event 1',
            start: '2018-06-05'
        },

        {
            title: 'Event 2',
            start: '2018-08-12'
        },

        {
            title: 'Event 3',
            start: '2019-12-31'
        }
    ]
});