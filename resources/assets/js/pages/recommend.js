// Checks if either telephone or email is entered and removes the required tag
var $inputs = $('input[name=telephone],input[name=email]');

$inputs.on('input', function () {
    // Set the required property of the other input to false if this input is not empty.
    $inputs.not(this).prop('required', !$(this).val().length);
});

$('textarea.disabled').each(function () {
    $(this).height($(this).prop('scrollHeight'));
});

// TODO: Split up for a separate JS file (we don't want this leaking into non-logged in user routes)
//  however, it will still not be accessible to them because of the Auth middleware.
$('#destroyButton').click(function (e) {
    e.preventDefault();

    var recommendationID = this.href.substr(this.href.lastIndexOf('/') + 1);

    $('#deleteModal').modal();

    $('#modalDeleteButton').click(() => {
        axios.delete('/recommend/' + recommendationID).then(() => window.location.replace('/recommend'));
    });
});
