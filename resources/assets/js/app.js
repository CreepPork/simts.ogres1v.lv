
/**
 * First we will load all of this project's JavaScript dependencies.
 * It is a great starting point when building robust, powerful web applications.
 */

require('./bootstrap');


$('body').scrollspy({
    target: '#navbar',
    offset: 10
});

require('./extensions/smoothScrolling.js');

$('tr[data-href]').click(function (e) {
    let link = e.currentTarget.getAttribute('data-href');

    window.location.href = link;
});
