@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Darba statusi</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Darba statusi</h1>

        <hr>

        @include('inc.messages')

        <table class="table table-hover table-clickable table-striped">
            <thead>
                <tr>
                    <th>Statuss</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($statuses as $status)
                    <tr data-href="/workStatus/{{ $status->id }}">
                        <td>{{ $status->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/workStatus/create" class="btn btn-outline-primary">Pievienot</a>
    </div>
@endsection
