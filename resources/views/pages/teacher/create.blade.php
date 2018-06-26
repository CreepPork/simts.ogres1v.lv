@extends('layouts.app')

@section('title', 'Pievienot skolotāju')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/teacher">Skolotāji</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pievienot skolotāju</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Pievienot skolotāju</h1>

        <hr>

        @include('inc.messages')

        <form action="/teacher" method="post">
            @csrf

            <div class="form-group required">
                <label for="first_name">Vārds</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required autofocus placeholder="Vārds">
            </div>

            <div class="form-group required">
                <label for="last_name">Uzvārds</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required placeholder="Uzvārds">
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Pievienot" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection
