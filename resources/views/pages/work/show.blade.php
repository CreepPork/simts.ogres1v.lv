@extends('layouts.app')

@section('title', $work->title)
@section('description', 'Ogres 1. vidusskolas projekta "100 labie darbi" darbs ' . $work->title)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item"><a href="/work">100 labie darbi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $work->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">{{ $work->title }}</h1>

        <hr>

        <div class="form-group">
            <label for="body">Apraksts</label>
            <textarea id="body" cols="30" rows="10" class="form-control readonly" readonly>{{ $work->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="teacher">Skolotājs</label>

            <input
            type="text"
            id="teacher"
            class="form-control"
            value="{{ $work->teacher->fullName() }}"
            readonly>
        </div>

        <div class="form-group">
            <label for="status">Darba statuss</label>

            <input
            type="text"
            id="status"
            class="form-control"
            value="{{ $work->status->status }}"
            readonly>
        </div>

        <div class="row align-items-center justify-content-between">
            @if ($work->completed_at != null)
                <div class="col">
                    <div class="form-group">
                        <span class="form-text text-muted">Plānots pabeigt {{ $work->completed_at->diffForHumans() }}.</span>
                    </div>
                </div>
            @endif

            @auth
                <div class="col">
                    <div class="form-group text-right">
                        <a href="/work/{{ $work->id }}/edit" class="btn btn-outline-primary mr-2">Rediģēt</a>
                        <a href="#" id="destroyButton" class="btn btn-outline-danger">Dzēst</a>
                    </div>
                </div>
            @endauth
        </div>

        @auth
            @include('inc.deleteModal', ['title' => $work->title, 'subject' => 'darbu'])
            @include('inc.ajaxFailModal')
        @endauth
    </div>
@endsection

@section('scripts')
    @auth
        <script defer src="{{ asset('js/pages/work.js') }}"></script>
    @endauth
@endsection
