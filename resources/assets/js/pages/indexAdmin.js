import { textareaHeight } from '../helpers/textareaHeight';

textareaHeight();

let pageID = this.href.substr().split('/')[4];

$('#imageDestroyButton').click(function (e) {
    e.preventDefault();

    axios.delete(`/index/${pageID}/image`).then(() => window.location.reload(true));
});

$('#fileDestroyButton').click(function (e) {
    e.preventDefault();

    axios.delete(`/index/${pageID}/file`).then(() => window.location.reload(true));
});
