require('lightbox2');

let primaryEventTitle = $('#event-title');
let primaryEventSummary = $('#event-summary');
let primaryEventDate = $('#event-date');

$('#eventCarousel').on('slid.bs.carousel', () => {
    let item = $('div[class="carousel-item active"]');

    let title = item.find('h3').html();
    let summary = item.find('p').html();
    let date = item.find('input').val();

    primaryEventTitle.html(title);
    primaryEventSummary.html(summary);
    primaryEventDate.html(date);
});
