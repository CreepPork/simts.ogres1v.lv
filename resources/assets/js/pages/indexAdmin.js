import { textareaHeight } from '../helpers/textareaHeight';

textareaHeight();

let pageID = document.location.href.substr().split('/')[4];

$('#imageDestroyButton').click(e => {
    e.preventDefault();

    axios.delete(`/index/${pageID}/image`).then(() => window.location.reload(true));
});

$('#fileDestroyButton').click(e => {
    e.preventDefault();

    axios.delete(`/index/${pageID}/file`).then(() => window.location.reload(true));
});
