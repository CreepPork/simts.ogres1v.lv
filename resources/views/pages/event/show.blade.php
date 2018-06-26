@extends('layouts.app')

@section('title', $event->title)
@section('description', 'Ogres 1. vidusskolas projekta "100 labie darbi" pasākums "' . $event->title . '" par ' . $event->summary)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">{{ $event->title }}</h1>

        <hr>

        @include('inc.messages')

        <div class="form-group">
            <label for="title">Nosaukums</label>
            <input type="text" name="title" id="title" class="form-control" readonly value="{{ $event->title }}" placeholder="Nosaukums">
        </div>

        <div class="form-group">
            <label for="summary">Īss apraksts</label>
            <input type="text" name="summary" id="summary" readonly value="{{ $event->summary }}" placeholder="Īss apraksts" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Apraksts</label>
            <textarea name="body" id="body" cols="30" rows="10" readonly placeholder="Apraksts" class="form-control">{{ $event->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="event_at">Pasākuma datums</label>
            <input type="datetime-local" name="event_at" id="event_at" placeholder="Pasākuma datums" readonly class="form-control" value="{{ $event->event_at->format('Y-m-d\TH:i:s') }}">
        </div>

        @auth
            <div class="form-group">
                <label for="image">Pievienotais attēls</label><br>
                <a id="image" class="btn btn-outline-secondary" target="_blank" href="{{ $event->image }}">Skatīt attēlu</a>
            </div>

            <div class="row">
                <div class="col">
                    <a href="/event/{{ $event->id }}/edit" class="btn btn-outline-primary">Rediģet</a>
                </div>

                <div class="col text-right">
                    <a href="#" id="destroyButton" class="btn btn-outline-danger">Dzēst</a>
                </div>
            </div>

            @include('inc.deleteModal', ['subject' => 'pasākumu', 'title' => $event->title])
        @endauth
    </div>
@endsection
