@extends('layouts.app')

@section('title', 'Rediģēt ' . $event->title)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/event">Pasākumi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rediģēt {{ $event->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Rediģēt {{ $event->title }}</h1>

        <hr>

        @include('inc.messages')

        <form action="/event/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group required">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ $event->title }}" autofocus placeholder="Nosaukums">
            </div>

            <div class="form-group required">
                <label for="summary">Īss apraksts</label>
                <input type="text" name="summary" id="summary" required value="{{ $event->summary }}" placeholder="Īss apraksts" class="form-control">
            </div>

            <div class="form-group required">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" required placeholder="Apraksts" class="form-control">{{ $event->body }}</textarea>
            </div>

            <div class="form-group required">
                <label for="event_at">Pasākuma datums</label>
                <input type="datetime-local" name="event_at" id="event_at" required placeholder="Pasākuma datums" step="1" class="form-control" value="{{ $event->event_at->format('Y-m-d\TH:i:s') }}">
            </div>

            <div class="form-group">
                <label for="image-view-button">Pievienotais attēls</label><br>

                <a id="image-view-button" class="btn btn-outline-secondary mb-2" target="_blank" href="{{ $event->image }}">Skatīt attēlu</a><br id="image-break">
                <a href="#" id="image-replace-button" class="btn btn-outline-danger"><i class="fas fa-redo-alt"></i> Mainīt pievienoto attēlu</a>

                <div id="image-upload" class="d-none">
                    <div class="custom-file">
                        <input type="file" accept="image/*" name="image" id="image" class="custom-file-label">
                        <label for="image" class="custom-file-label">Pievienot attēlu</label>
                    </div>

                    <small class="form-text text-muted">Maksimums 10MB. Attēla izmēriem ir jābūt 1024x512px.</small>
                </div>
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Saglabāt" class="form-control btn btn-outline-primary">
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/event.js') }}"></script>
@endsection
