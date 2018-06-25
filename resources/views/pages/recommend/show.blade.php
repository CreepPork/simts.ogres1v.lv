@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
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
            <textarea id="body" cols="30" rows="10" class="form-control readonly" readonly>{{ $recommendation->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="attachment">Pievienotais fails</label><br>
            @if (isset($recommendation->attachment))
                <a class="btn btn-outline-secondary" target="_blank" href="{{ $attachmentURL }}">{{ __('mime.' . $attachmentMIMEType) }}</a>
            @else
                <input type="text" readonly class="form-control" value="Nav pieejams">
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
                    value="{{ $recommendation->email ?? 'Nav pieejams' }}"
                    readonly>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="telephone">Telefons</label>

                    <input
                    type="text"
                    id="telephone"
                    class="form-control"
                    value="{{ $recommendation->telephone ?? 'Nav pieejams' }}"
                    readonly>
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

    @include('inc.deleteModal', ['title' => $recommendation->title, 'subject' => 'ieteikumu'])
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/recommend.js') }}"></script>
@endsection
