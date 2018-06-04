@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item"><a href="/recommend/create">Ieteikt</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ieteikumi</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Ieteikumi</h1>

        <hr>

        @if (count($recommendations) > 0)
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nosaukums</th>
                        <th>Īss apraksts</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recommendations as $recommendation)
                    <tr class="clickable" data-href="/recommend/{{ $recommendation->id }}">
                            <td>{{ $recommendation->title }}</td>
                            <td>{{ str_limit($recommendation->body, 120) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">Nav ieteikumu.</div>
        @endif
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/recommend.js') }}"></script>
@endsection
