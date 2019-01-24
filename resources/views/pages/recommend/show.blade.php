@extends('layouts.app')

@section('title', $recommendation->title)

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

        <p class="text-justify preserve-formatting">{{ $recommendation->body }}</p>

        <div class="row">

        </div>

        @if ($recommendation->attachment)
            <div class="form-group">
                <label for="attachment">Pievienotais fails</label><br>
                <a class="btn btn-outline-secondary" target="_blank" href="{{ $attachmentURL }}">{{ __('mime.' . $attachmentMIMEType) }}</a>
            </div>
        @endif

        <div class="row align-items-center justify-content-between">
            <div class="col">
                <div class="form-group">
                    <span class="form-text text-muted">Izveidots {{ $recommendation->created_at->diffForHumans() }}.</span>
                </div>
            </div>

            @if ($recommendation->email)
                <div class="col">
                    <div class="form-group text-center">
                        <span class="form-text text-muted"><a href="mailto:{{ $recommendation->email }}">{{ $recommendation->email }}</a></span>
                    </div>
                </div>
            @endif

            @if ($recommendation->telephone)
                <div class="col">
                    <div class="form-group text-center">
                        <span class="form-text text-muted">{{ $recommendation->telephone }}</span>
                    </div>
                </div>
            @endif

            <div class="col">
                <div class="form-group text-right">
                    <a href="#" id="destroyButton" class="btn btn-outline-danger">Dzēst</a>
                </div>
            </div>
        </div>
    </div>

    @include('inc.deleteModal', ['title' => $recommendation->title, 'subject' => 'ieteikumu'])
    @include('inc.ajaxFailModal')
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/recommend.js') }}"></script>
@endsection
