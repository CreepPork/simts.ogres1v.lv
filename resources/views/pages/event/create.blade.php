@extends('layouts.app')

@section('title', 'Pievienot pasākumu')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/event">Pasākumi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pievienot pasākumu</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Pievienot pasākumu</h1>

        <hr>

        @include('inc.messages')

        <form action="/event" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group required">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" required autofocus placeholder="Nosaukums">
            </div>

            <div class="form-group required">
                <label for="summary">Īss apraksts</label>
                <input type="text" name="summary" id="summary" value="{{ old('summary') }}" required placeholder="Īss apraksts" class="form-control">
            </div>

            <div class="form-group required">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" required placeholder="Apraksts" class="form-control">{{ old('body') }}</textarea>
            </div>

            <div class="form-group required">
                <label for="event_at">Pasākuma datums</label>
                <input type="datetime-local" name="event_at" id="event_at" value="{{ old('event_at') }}" step="1" required placeholder="Pasākuma datums" class="form-control">
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input required type="file" accept="image/*" name="image" id="image" class="custom-file-label">
                    <label for="image" class="custom-file-label">Pievienot attēlu</label>
                </div>

                <small class="form-text text-muted">Maksimums 10MB. Attēla izmēriem ir jābūt 1024x512px.</small>
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Saglabāt" class="form-control btn btn-outline-primary">
            </div>
        </form>
    </div>
@endsection
