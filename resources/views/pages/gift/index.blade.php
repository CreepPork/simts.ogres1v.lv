@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning"><b>Sistēmā nav pievienotu aprakstu par dāvināšanu!</b></div>
        @endif
    </div>
@endsection
