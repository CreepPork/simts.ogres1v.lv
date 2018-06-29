@extends('layouts.app')

@section('title', 'Pasākumi')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pasākumi</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Pasākumi</h1>

        <hr>

        @include('inc.messages')

        @if (count($events) > 0)
            <table class="table table-clickable table-striped table-hover">
                <thead>
                    <tr>
                        <th>Pasākums</th>
                        <th>Datums</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($events as $event)
                        <tr data-href="/event/{{ $event->id }}">
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->event_at->formatLocalized('%e. %B %Y %H:%M') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning"><b>Sistēmā nav pievienoti pasākumi!</b></div>
        @endif

        <a href="/event/create" class="btn btn-outline-primary">Pievienot</a>
    </div>
@endsection
