@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item"><a href="/recommend/create">Ieteikt</a></li>
            <li class="breadcrumb-item"><a href="/recommend">Ieteikumi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $recommendation->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">{{ $recommendation->title }}</h1>

        <hr>

        <div class="form-group">
            <label for="body">Apraksts</label>
            <textarea id="body" cols="30" rows="10" class="form-control body-disabled" disabled>{{ $recommendation->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="attachment">Pievienotais fails</label><br>
            @if ($recommendation->attachment == null)
                <input type="text" disabled class="form-control" value="Nav pieejams">
            @else
                <a class="btn btn-outline-secondary" href="/storage/recommend/{{ $attachmentInfo[0] }}">{{ __('mime.' . $attachmentInfo[1]) }}</a>
            @endif
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="email">E-pasts</label>

                    <input
                    type="text"
                    id="email"
                    class="form-control"
                    value="{{ isset($recommendation->email) > 0 ? $recommendation->email : 'Nav pieejams' }}"
                    disabled>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="telephone">Telefons</label>

                    <input
                    type="text"
                    id="telephone"
                    class="form-control"
                    value="{{ isset($recommendation->telephone) > 0 ? $recommendation->telephone : 'Nav pieejams' }}"
                    disabled>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-between">
            <div class="col">
                <div class="form-group">
                    <span class="form-text text-muted">Izveidots {{ $recommendation->created_at->diffForHumans() }}.</span>
                </div>
            </div>

            <div class="col">
                <div class="form-group text-right">
                    <a href="#" id="destroyButton" class="btn btn-outline-danger">Dzēst</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Dzēst "{{ $recommendation->title }}"?</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Vai tiešām jūs vēlaties <b>dzēst</b> ieteikumu "{{ $recommendation->title }}"? <br> Tas ir <b>neatgriezenisks</b> process!
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Atstāt</button>
                    <button type="button" id="modalDeleteButton" class="btn btn-danger">Dzēst</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/recommend.js') }}"></script>
@endsection
