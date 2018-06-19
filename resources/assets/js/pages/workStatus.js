$('#destroyButton').click(function (e) {
    e.preventDefault();

    let workStatusID = this.href.substr(this.href.lastIndexOf('/') + 1);

    $('#deleteModal').modal();

    $('#modalDeleteButton').click(() => {
        axios.delete('/workStatus/' + workStatusID).then(() => window.location.replace('/workStatus'));
    });
});
