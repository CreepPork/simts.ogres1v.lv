{{-- Delete modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Dzēst "{{ $title }}"?</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Vai tiešām jūs vēlaties <b>dzēst</b> {{ $object }} "{{ $title }}"? <br> Tas ir <b>neatgriezenisks</b> process!
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Atstāt</button>
                <button type="button" id="modalDeleteButton" class="btn btn-danger">Dzēst</button>
            </div>
        </div>
    </div>
</div>
