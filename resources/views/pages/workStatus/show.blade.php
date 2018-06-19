@extends('layouts.app')

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
        <h1 class="text-center">Darba statusi</h1>

        <hr>

        <div class="form-group">
            <label for="status">Statuss</label>
            <input type="text" name="status" id="status" disabled value="{{ $status->status }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="assignedWorks">Pievienotie darbi šim statusam</label>

            @if (count($status->works) > 0)
                <table id="assignedWorks" class="table table-hover table-clickable table-striped">
                    <thead>
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

        <div class="form-group">
            <span class="form-text">Izveidots {{ $status->created_at->diffForHumans() }}.</span>
        </div>
    </div>
@endsection
