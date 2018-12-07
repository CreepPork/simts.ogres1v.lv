let pageID = document.location.href.substr(0).split('/')[4];

$('#imageDestroyButton').click(e => {
    e.preventDefault();

    // noinspection ES6ModulesDependencies
    // noinspection ES6ModulesDependencies
    axios.delete(`/index/${pageID}/image`)
        .then(() => window.location.reload(true))
        .catch(() => $('#failModal').modal());
});

$('#fileDestroyButton').click(e => {
    e.preventDefault();

    // noinspection ES6ModulesDependencies
    // noinspection ES6ModulesDependencies
    axios.delete(`/index/${pageID}/file`)
        .then(() => window.location.reload(true))
        .catch(() => $('#failModal').modal());
});
