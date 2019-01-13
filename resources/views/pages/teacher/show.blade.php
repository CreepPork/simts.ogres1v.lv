@extends('layouts.app')

@section('title', $teacher->fullName())

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/teacher">Skolotāji</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $teacher->fullName() }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">{{ $teacher->fullName() }}</h1>

        <hr>

        <div class="form-group">
            <label for="assignedWorks">Pievienotie darbi šim skolotājam</label>

            @if (count($teacher->works) > 0)
                <table id="assignedWorks" class="table table-hover table-clickable table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Darbs</th>
                            <th>Darba statuss</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($teacher->works as $work)
                            <tr data-href="/work/{{ $work->id }}">
                                <td>{{ $work->title }}</td>
                                <td>{{ $work->status->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info" id="assignedWorks">Šim skolotājam nav pievienotu darbu!</div>
            @endif
        </div>

        @if (count($teacher->works) > 0)
            <div class="alert alert-info">Lai izdzēstu šo skolotāju, noņemiet skolotājam visus pievienotos darbus!</div>
        @endif

        <div class="row align-items-center justify-content-between">
            <div class="col">
                <div class="form-group">
                    <span class="text-muted form-text">Pievienots {{ $teacher->created_at->diffForHumans() }}.</span>
                </div>
            </div>

            <div class="col">
                <div class="form-group text-right">
                    <a href="/teacher/{{ $teacher->id }}/edit" class="btn btn-outline-primary">Rediģēt</a>
                    <a href="#" id="destroyButton"
                    class="btn btn-outline-danger {{ count($teacher->works) > 0 ? 'disabled' : '' }} ">
                    Dzēst
                </a>
            </div>
        </div>
    </div>

        @include('inc.deleteModal', ['title' => $teacher->fullName(), 'subject' => 'skolotāju'])
        @include('inc.ajaxFailModal')
    </div>
@endsection
