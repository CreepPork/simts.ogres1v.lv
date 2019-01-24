@extends('layouts.app')

@section('title', $work->title)
@section('description', 'Ogres 1. vidusskolas projekta "100 labie darbi" darbs ' . $work->title)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            @guest
                <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            @endguest
            <li class="breadcrumb-item"><a href="/work">100 labie darbi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $work->title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">{{ $work->title }}</h1>

        <hr>

        <p class="text-justify preserve-formatting">{{ $work->body }}</p>

        @if ($work->image)
            <div class="text-center form-group">
                <image src="{{ asset($work->imageUrl) }}" class="img-fluid"></image>
            </div>
        @endif

        <div class="row align-items-center justify-content-between">
            <div class="col">
                <div class="form-group">
                    <span class="form-text text-muted">Autors - {{ $work->teacher->fullName() }}</span>
                </div>
            </div>

            <div class="col">
                <div class="form-group text-center">
                    <span class="form-text text-muted">Statuss - {{ $work->status->status }}</span>
                </div>
            </div>

            @if ($work->completed_at != null)
                <div class="col">
                    <div class="form-group {{ auth()->check() ? 'text-center' : 'text-right' }}">
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
