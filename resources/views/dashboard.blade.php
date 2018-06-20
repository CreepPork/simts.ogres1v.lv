@extends('layouts.app')

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Informācijas panelis</h1>

        <hr>

        @include('inc.messages')

        <div class="btn-group d-flex justify-content-center">
            <a href="/recommend" class="btn btn-primary">Ieteikumi</a>
            <a href="/work" class="btn btn-primary">Darbi</a>
            <a href="/workStatus" class="btn btn-primary">Darba statusi</a>
            <a href="/teacher" class="btn btn-primary">Skolotāji</a>
            <a href="/index" class="btn btn-primary">Rediģēt galvenās lapas saturu</a>
        </div>
    </div>
@endsection
