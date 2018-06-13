$('textarea.disabled').each(function () {
    $(this).height($(this).prop('scrollHeight'));
});

$('#destroyButton').click(function (e) {
    e.preventDefault();

    var workID = this.href.substr(this.href.lastIndexOf('/') + 1);

    $('#deleteModal').modal();

    $('#modalDeleteButton').click(() => {
        axios.delete('/work/' + workID).then(() => window.location.replace('/work'));
    });
});
