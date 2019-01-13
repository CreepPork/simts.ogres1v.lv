$('#destroyButton').click(function () {
    let id = this.dataset.id;

    // noinspection ES6ModulesDependencies
    // noinspection ES6ModulesDependencies
    axios.delete(`/gift/${id}`)
        .then(() => window.location.reload(true))
        .catch(() => $('#failModal').modal());
});
