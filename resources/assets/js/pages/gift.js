import { textareaHeight } from '../helpers/textareaHeight';

textareaHeight();

$('#destroyButton').click(function () {
    let id = this.dataset.id;

    axios.delete(`/gift/${id}`)
        .then(() => window.location.reload(true))
        .catch(() => $('#failModal').modal());
});
