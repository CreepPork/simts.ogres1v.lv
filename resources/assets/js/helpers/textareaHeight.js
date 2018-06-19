export function textareaHeight() {
    $('textarea.disabled').each(function () {
        $(this).height($(this).prop('scrollHeight'));
    });
}
