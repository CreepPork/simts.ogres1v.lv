@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/gift">Dāvināt</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rediģēt {{ $gift->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Rediģēt {{ $gift->title }}</h1>

        <hr>

        @include('inc.messages')

        <form action="/gift/{{ $gift->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group required">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $gift->title }}" placeholder="Nosaukums" required autofocus>
            </div>

            <div class="form-group required">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Apraksts" required>{{ $gift->body }}</textarea>
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Saglabāt" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/gift.js') }}"></script>
@endsection
