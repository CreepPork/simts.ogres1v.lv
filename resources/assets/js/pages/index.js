require('lightbox2');

let primaryEventTitle = $('#event-title');
let primaryEventSummary = $('#event-summary');
let primaryEventDate = $('#event-date');
let primaryEventView = $('#event-view');

$('#eventCarousel').on('slide.bs.carousel', event => {
    let item = $(event.relatedTarget);

    let itemID = item.attr('data-id');

    let title = item.find('h3').html();
    let summary = item.find('p').html();
    let date = item.find('input').val();

    primaryEventTitle.html(title);
    primaryEventSummary.html(summary);
    primaryEventDate.html(date);

    primaryEventView.attr('href', `/event/${itemID}`);
});

let parallax = $('.parallax');
let parallaxURL = $('#parallaxURL').val();

parallax.css('background-image', `url('${parallaxURL}'`);
