@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ieteikt</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Ieteikt</h1>

        <hr>

        <form action="/recommend" method="post"></form>
    </div>
@endsection
