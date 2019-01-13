@extends('layouts.app')

@section('title', $status->status)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/workStatus">Darba statusi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $status->status }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">{{ $status->status }}</h1>

        <hr>

        <div class="form-group">
            <label for="assignedWorks">Pievienotie darbi šim statusam</label>

            @if (count($status->works) > 0)
                <table id="assignedWorks" class="table table-hover table-clickable table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Darbs</th>
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
            @else
                <div class="alert alert-warning" id="assignedWorks"><b>Šim statusam nav pievienotu darbu!</b></div>
            @endif
        </div>

        <span class="text-muted form-text">Pievienots {{ $status->created_at->diffForHumans() }}.</span>
    </div>
@endsection
