@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Skolotāji</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Skolotāji</h1>

        <hr>

        @include('inc.messages')

        <table class="table table-hover table-clickable table-striped">
            <thead>
                <tr>
                    <th>Skolotājs</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($teachers as $teacher)
                    <tr data-href="/teacher/{{ $teacher->id }}">
                        <td>{{ $teacher->fullName() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/teacher/create" class="btn btn-outline-primary">Pievienot</a>
    </div>
@endsection
