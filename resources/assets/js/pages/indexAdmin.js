import { textareaHeight } from '../helpers/textareaHeight';

textareaHeight();

$('#imageDestroyButton').click(function (e) {
    e.preventDefault();

    let pageID = this.href.substr().split('/')[4];

    axios.delete(`/index/${pageID}`).then(() => window.location.reload(true));
});
