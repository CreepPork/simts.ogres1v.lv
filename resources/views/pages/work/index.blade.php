@extends('layouts.app')

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Hello World!</h1>

        <hr>

        @foreach ($works as $work)
            {{ $work->title }}
        @endforeach
    </div>
@endsection
