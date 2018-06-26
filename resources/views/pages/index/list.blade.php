@extends('layouts.app')

@section('title', 'Rediģēt lapas saturu')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rediģēt lapas saturu</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Rediģēt lapas saturu</h1>

        <hr>

        @include('inc.messages')

        <table class="table table-clickable table-hover table-striped">
            <thead>
                <tr>
                    <th>Sekcija</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($indexes as $index)
                    <tr data-href="/index/{{ $index->id }}/edit">
                        <td>{{ $index->section_title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
