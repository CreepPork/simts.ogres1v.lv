@extends('layouts.app')

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">100 labie darbi</h1>

        <hr>

        <table class="table table-hover table-clickable table-striped">
            <thead>
                <tr>
                    <th>Nosaukums</th>
                    <th>Skolotāja</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->teacher->fullName() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
