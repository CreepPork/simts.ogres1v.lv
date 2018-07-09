@extends('layouts.app')

@section('title', 'Dāvināt')
@section('description', 'Noskaidro kā Tu vari palīdzēt ar dāvināšanu Ogres 1. vidusskolai saistībā ar vidusskolas projektu 100 labie darbi!')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            @guest
                <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            @endguest
            <li class="breadcrumb-item active" aria-current="page">Dāvināt</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Dāvināt</h1>

        <hr>

        @include('inc.messages')

        @if (count($gifts) > 0)
            <div id="accordion">
                @foreach ($gifts as $gift)
                    <div class="card">
                        <div class="card-header" id="gift_{{ $gift->id }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link {{ $loop->first ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse_{{ $gift->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse_{{ $gift->id }}">
                                    {{ $gift->title }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse_{{ $gift->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="gift_{{ $gift->id }}" data-parent="#accordion">
                            <div class="card-body">
                                {{ $gift->body }}

                                @auth
                                    <div class="row pt-3">
                                        <div class="col">
                                            <a href="/gift/{{ $gift->id }}/edit" class="btn btn-outline-primary">Rediģēt</a>
                                        </div>

                                        <div class="col text-right">
                                            <a href="#" id="destroyButton" data-id="{{ $gift->id }}" class="btn btn-outline-danger">Dzēst</a>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning"><b>Sistēmā nav pievienotu aprakstu par dāvināšanu!</b></div>
        @endif

        @auth
            <a href="/gift/create" class="btn btn-outline-primary mt-3">Pievienot</a>
        @endauth
    </div>
@endsection

@section('scripts')
    @auth
        <script defer src="{{ asset('js/pages/gift.js') }}"></script>
    @endauth
@endsection
