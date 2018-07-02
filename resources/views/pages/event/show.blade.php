@extends('layouts.app')

@section('title', $mainEvent->title)
@section('description', 'Ogres 1. vidusskolas projekta "100 labie darbi" pasākums "' . $mainEvent->title . '" par ' . $mainEvent->summary)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li id="breadcrumb-active" class="breadcrumb-item active" aria-current="page">{{ $mainEvent->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <div id="eventCarousel" class="carousel slide mb-3" data-interval="false" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($events as $event)
                    <li data-target="#eventCarousel" data-slide-to="{{ $event->id }}" class="{{ $loop->iteration == $mainEvent->id ? 'active' : ''}}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach ($events as $event)
                    <div data-id="{{ $event->id }}" class="carousel-item {{ $loop->iteration == $mainEvent->id ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}">

                        <input type="hidden" name="title" value="{{ $event->title }}">
                        <input type="hidden" name="body" value="{{ $event->body }}">
                        <input type="hidden" name="event_at" value="{{ $event->event_at->formatLocalized('%e. %B %Y %H:%M') }}">
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" data-href-disable="true" href="#eventCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" data-href-disable="true" href="#eventCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>

                <span class="sr-only">Next</span>
            </a>
        </div>

        <h1 id="title" class="text-center">{{ $mainEvent->title }}</h1>

        <hr>

        @include('inc.messages')

        <p id="body">
            {{ $mainEvent->body }}
        </p>

        <div class="form-group">
            <input type="text" name="event_at" id="event_at" readonly class="form-control" value="{{ $mainEvent->event_at->formatLocalized('%e. %B %Y %H:%M') }}">
        </div>

        @auth
            <div class="row">
                <div class="col">
                    <a href="/event/{{ $mainEvent->id }}/edit" class="btn btn-outline-primary">Rediģet</a>
                </div>

                <div class="col text-right">
                    <a href="#" id="destroyButton" class="btn btn-outline-danger">Dzēst</a>
                </div>
            </div>

            @include('inc.deleteModal', ['subject' => 'pasākumu', 'title' => $mainEvent->title])
        @endauth
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/event.js') }}"></script>
@endsection
