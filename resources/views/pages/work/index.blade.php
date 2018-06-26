@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item active" aria-current="page">100 labie darbi</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">100 labie darbi</h1>

        <hr>

        @include('inc.messages')

        @if (count($statuses) == 0)
            <div class="alert alert-warning">
                Nav pievienoti darbi.
            </div>
        @else
            @foreach ($statuses as $status)
                <div class="pt-3">
                    <h3 class="text-center">{{ $status->status }}</h3>

                    <table class="table table-hover table-clickable table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th class="w-75">Nosaukums</th>
                                <th>Skolotājs</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($status->works as $work)
                            <tr data-href="/work/{{ $work->id }}">
                                    <td>{{ $work->title }}</td>
                                    <td>{{ $work->teacher->fullName() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                </div>
            @endforeach
        @endif

        @auth
            <a href="/work/create" class="btn btn-outline-primary">Pievienot</a>
        @endauth
    </div>
@endsection
