// Checks if either telephone or email is entered and removes the required tag
var $inputs = $('input[name=telephone],input[name=email]');

$inputs.on('input', function () {
    // Set the required property of the other input to false if this input is not empty.
    $inputs.not(this).prop('required', !$(this).val().length);
});

$('tr[data-href]').click(function (e) {
    var link = e.currentTarget.getAttribute('data-href');

    window.location.href = link;
});
