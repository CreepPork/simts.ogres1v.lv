
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

$('body').scrollspy({
    target: '#navbar',
    offset: 10
});

require('./extensions/smoothScrolling.js');

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
