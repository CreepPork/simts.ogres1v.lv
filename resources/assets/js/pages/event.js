import { textareaHeight } from '../helpers/textareaHeight';

textareaHeight();

$('#image-replace-button').click(() => {
    $('#image-view-button').hide();
    $('#image-replace-button').hide();
    $('#image-break').hide();

    $('#image-upload').removeClass('d-none');
});

$('#eventCarousel').on('slid.bs.carousel', () => {
    let item = $('div[class="carousel-item active"]');

    let itemID = item.attr('data-id');

    let title = item.find('input[name="title"]').val();
    let body = item.find('input[name="body"]').val();
    let event_at = item.find('input[name="event_at"]').val();

    $('#title').html(title);
    $('#body').html(body);
    $('#event_at').val(event_at);

    $('#breadcrumb-active').html(title);

    document.title = title;

    let pushed = false;

    if (pushed)
    {
        window.history.replaceState('event', title, `/event/${itemID}`);
    }
    else
    {
        window.history.pushState('event', title, `/event/${itemID}`);
        pushed = true;
    }
});
