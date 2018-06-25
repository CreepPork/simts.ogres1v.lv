export function textareaHeight() {
    $('textarea.readonly').each(function () {
        $(this).height($(this).prop('scrollHeight'));
    });
}
