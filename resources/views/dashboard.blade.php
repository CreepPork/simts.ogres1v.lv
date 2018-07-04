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

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="works" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Darbi
                </button>
                <div class="dropdown-menu" aria-labelledby="works">
                    <a class="dropdown-item" href="/work">Skatīt visus</a>
                    <a class="dropdown-item" href="/work/create">Pievienot jaunu</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="gift" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dāvināt
                </button>
                <div class="dropdown-menu" aria-labelledby="gift">
                    <a class="dropdown-item" href="/gift">Skatīt visus</a>
                    <a class="dropdown-item" href="/gift/create">Pievienot jaunu</a>
                </div>
            </div>

            <a href="/recommend" class="btn btn-primary">Ieteikumi</a>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="events" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pasākumi
                </button>
                <div class="dropdown-menu" aria-labelledby="events">
                    <a class="dropdown-item" href="/event">Skatīt visus</a>
                    <a class="dropdown-item" href="/event">Pievienot jaunu</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="index" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Rediģēt galvenās lapas saturu
                </button>
                <div class="dropdown-menu" aria-labelledby="index">
                    <a class="dropdown-item" href="/">Skatīt galveno lapu</a>
                    <a class="dropdown-item" href="/index">Skatīt visas sekcijas</a>
                    @foreach ($indexes as $index)
                        <a class="dropdown-item" href="/index/{{ $index->id }}/edit">Rediģēt sekciju "{{ $index->section_title }}"</a>
                    @endforeach
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="teacher" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Skolotāji
                </button>
                <div class="dropdown-menu" aria-labelledby="teacher">
                    <a class="dropdown-item" href="/teacher">Skatīt visus</a>
                    <a class="dropdown-item" href="/teacher/create">Pievienot jaunu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
