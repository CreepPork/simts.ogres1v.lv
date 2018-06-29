@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Informācijas panelis</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Informācijas panelis</h1>

        <hr>

        @include('inc.messages')

        <div class="btn-group d-flex justify-content-center">
            <a href="/workStatus" class="btn btn-primary">Darba statusi</a>
            <a href="/work" class="btn btn-primary">Darbi</a>
            <a href="/gift" class="btn btn-primary">Dāvināt</a>
            <a href="/recommend" class="btn btn-primary">Ieteikumi</a>
            <a href="/event" class="btn btn-primary">Pasākumi</a>
            <a href="/index" class="btn btn-primary">Rediģēt galvenās lapas saturu</a>
            <a href="/teacher" class="btn btn-primary">Skolotāji</a>
        </div>
    </div>
@endsection
