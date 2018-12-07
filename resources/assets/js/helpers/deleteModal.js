$('#destroyButton').click(function (e) {
    e.preventDefault();

    let page = this.href.substr(0).split('/')[3];
    let pageID = this.href.substr(this.href.lastIndexOf('/') + 1);

    $('#deleteModal').modal();

    $('#modalDeleteButton').click(() => {
        // noinspection ES6ModulesDependencies
        // noinspection ES6ModulesDependencies
        axios.delete(`/${page}/${pageID}`)
            .then(() => window.location.replace(`/${page}`))
            .catch(() => $('#failModal').modal());
    });
});
