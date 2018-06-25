import { textareaHeight } from '../helpers/textareaHeight';

textareaHeight();

$('#image-replace-button').click(() => {
    $('#image-view-button').hide();
    $('#image-replace-button').hide();
    $('#image-break').hide();

    $('#image-upload').removeClass('d-none');
});
