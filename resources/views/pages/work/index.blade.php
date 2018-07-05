@extends('layouts.app')

@section('title', 'Skatīt visus darbus')
@section('description', 'Apskati visus Ogres 1. vidusskolas projekta "100 labie darbi" darbus!')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item active" aria-current="page">100 labie darbi</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">100 labie darbi</h1>

        <hr>

        @include('inc.messages')

        @if (count($statuses) == 0)
            <div class="alert alert-warning">
                <b>Nav pievienoti darbi.</b>
            </div>
        @else
            @foreach ($statuses as $status)
                @if (count($status->works) > 0)
                    <div class="pt-3">
                        <h3 class="text-center">{{ $status->status }}</h3>

                        <table class="table table-hover table-clickable table-striped table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th class="w-75">Nosaukums</th>
                                    <th>Skolotājs</th>
                                    @auth
                                        <th>Kārtot</th>
                                    @endauth
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($status->works as $work)
                                <tr data-id="{{ $work->id }}" data-href="/work/{{ $work->id }}" class="tr-draggable">
                                        <td>{{ $work->title }}</td>
                                        <td>{{ $work->teacher->fullName() }}</td>
                                        @auth
                                            <td class="text-center text-secondary {{ auth()->check() ? 'td-draggable' : '' }}"><i class="fas fa-sort"></i></td>
                                        @endauth
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                    </div>
                @endif
            @endforeach
        @endif

        @auth
            <a href="/work/create" class="btn btn-outline-primary">Pievienot</a>

            @include('inc.ajaxFailModal')
        @endauth
    </div>
@endsection

@section('scripts')
    @auth
        <script defer src="{{ asset('js/pages/work.js') }}"></script>
    @endauth
@endsection
